<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

use Doctrine\Common\Cache\FilesystemCache;
use GraphQL\Type\Definition\ResolveInfo;
use Psr\Log\LoggerInterface;
use Silex\Application;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use XCart\Bus\Core\DataSourceAnnotationService;
use XCart\Bus\Core\RebuildAnnotationService;
use XCart\Bus\Core\ResolverAnnotationService;
use XCart\Bus\System\ResourceChecker;
use XCart\SilexAnnotations\AnnotationServiceProvider;
use XCart\SilexAnnotations\NameConverter\FQCNNotation;
use XCart\SilexAnnotations\RouterAnnotationService;
use XCart\SilexAnnotations\ServiceAnnotationService;

/**
 * @param array $config
 *
 * @return Application
 */
return static function ($config) {
    $app = new Application();

    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);

    $app['xc_config'] = $config;

    $rootDir = dirname(__DIR__, 2) . '/';

    $serviceAuthCode = '06c2792b0b1db32aac9cb5eb69eabc04';
    $config          = [
        'debug'                      => $config['log_details']['level'] === (string) \LOG_DEBUG,
        'developer_mode'             => (bool) $config['performance']['developer_mode'],
        'ignore_system_modules'      => (bool) ($config['performance']['ignore_system_modules'] ?? false),
        'jwt_secret_key_legacy'      => $config['installer_details']['shared_secret_key'],
        'jwt_secret_key'             => $config['installer_details']['auth_code'],
        'authcode_reference'         => $config['installer_details']['auth_code'],
        'service_authcode_reference' => $serviceAuthCode,
        'domain'                     => '://' . $config['host_details']['http_host'],
        'webdir'                     => rtrim($config['host_details']['web_dir'], '/'),
        'admin_script'               => $config['host_details']['admin_self'],
        'affiliate_id'               => $config['affiliate']['id'] ?? null,
        'installation_lng'           => $config['installation']['installation_lng'],
        'xc_cookie_name'             => 'xid',
        'log.path'                   => $rootDir . 'var/log/',
        'marketplace.editions_url'   => $config['marketplace']['editions_url'],
        'trial.end_date'             => $config['trial']['end_date'] ?? null,
        'marketplace.endpoint'       => $config['marketplace']['url'],
        'bus_root_dir'               => __DIR__ . '/',
        'root_dir'                   => $rootDir,
        'cache_dir'                  => $rootDir . 'files/service',
        'file_cache_dir'             => $rootDir . 'var/datacache/bus/',
        'module_packs_dir'           => $rootDir . 'var/packs/',
        'tmp_dir'                    => $rootDir . 'var/tmp/',
        'phar_is_installed'          => ResourceChecker::PharIsInstalled(),
        'email'                      => $_COOKIE['recent_login'] ?? '',
        'verify_certificate'         => (bool) $config['service']['verify_certificate'],
    ];

    $app['config'] = $config;
    $app['debug']  = $config['debug'];

    if (isset($app['xc_config']['other']['trusted_proxies']) && $app['xc_config']['other']['trusted_proxies']) {
        $trustedProxiesOption = str_replace(' ', '', $app['xc_config']['other']['trusted_proxies']);
        $trustedProxies       = explode(',', $trustedProxiesOption);

        Request::setTrustedProxies($trustedProxies, Request::HEADER_X_FORWARDED_ALL);
    }

    $app->register(new AnnotationServiceProvider(), [
        AnnotationServiceProvider::NAME_CONVERTER_SERVICE_NAME => new FQCNNotation(),
        AnnotationServiceProvider::ROOT_OPTION_NAME            => __DIR__,
        AnnotationServiceProvider::CACHE_SERVICE_NAME          => new FilesystemCache($app['config']['file_cache_dir']),
        AnnotationServiceProvider::SERVICES_OPTION_NAME        => [
            ServiceAnnotationService::class    => __DIR__,
            RouterAnnotationService::class     => __DIR__ . '/XCart/Bus/Controller',
            ResolverAnnotationService::class   => __DIR__ . '/XCart/Bus/Query/Resolver',
            DataSourceAnnotationService::class => __DIR__ . '/XCart/Bus/Query/Data',
            RebuildAnnotationService::class    => __DIR__ . '/XCart/Bus/Rebuild',
        ],
        ServiceAnnotationService::ARGUMENT_MAPPINGS            => [
            LoggerInterface::class                            => 'monolog',
            \XCart\Bus\System\FilesystemInterface::class      => \XCart\Bus\System\Filesystem::class,
            \XCart\Bus\System\FinderInterface::class          => \XCart\Bus\System\Finder::class,
            \XCart\Bus\Domain\Backup\BackupInterface::class   => \XCart\Bus\Domain\Backup\DirBackup::class,
            \XCart\Bus\Domain\Storage\StorageInterface::class => \XCart\Bus\Domain\Storage\PHPSerializer::class,
        ],
    ]);

    $app->register(new Silex\Provider\MonologServiceProvider());

    $app->extend('monolog', function (\Monolog\Logger $monolog, Application $app) {
        return \XCart\Bus\Core\Logger\Request::serviceConstructor($app);
    });

    $app['xCartClient.client-factory'] = $app->protect(function () use ($app) {
        $config = $app['config'];

        $handler = \GuzzleHttp\HandlerStack::create();

        $handler->push(
            \GuzzleHttp\Middleware::log(
                $app[\XCart\Bus\Core\Logger\Request::class],
                new \GuzzleHttp\MessageFormatter(),
                $app['debug'] ? \Psr\Log\LogLevel::DEBUG : \Psr\Log\LogLevel::INFO
            )
        );

        $guzzleClient = new \GuzzleHttp\Client([
            'verify'   => $config['verify_certificate'],
            'base_uri' => $config['domain'] . rtrim($config['webdir'], '/') . '/',
            'handler'  => $handler,
        ]);

        return $guzzleClient;
    });

    $app['fileSystem'] = static function ($app) {
        return new Filesystem();
    };

    $app->before(static function (Request $request, Application $app) {
        /** @var ResourceChecker $resourceChecker */
        $resourceChecker = $app[ResourceChecker::class];
        /** @var LoggerInterface $logger */
        $logger = $app[\XCart\Bus\Core\Logger\Request::class];

        // On 64-bit system we double the memory limit required.
        if ($resourceChecker->setMemoryLimit($resourceChecker->getIntegerLength() === 8 ? '256M' : '128M')) {
            $logger->debug('Set memory limit', ['memory_limit' => $resourceChecker->getMemoryLimit()]);
        } else {
            $logger->warning('Unable to set memory limit', ['memory_limit' => $resourceChecker->getMemoryLimit()]);
        }
    });

    $app->before(static function (Request $request, Application $app) {
        $scheme = $request->getScheme() ?: 'http';

        $config = $app['config'];

        $config['scheme'] = $scheme;
        $config['domain'] = $scheme . $config['domain'];

        $app->offsetSet('config', $config);
    });

    $app->before(static function (Request $request, Application $app) {
        $app[ResourceChecker::class]->start();
    });

    $app->before(static function (Request $request) {
        if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
            $data = json_decode($request->getContent(), true);
            $request->request->replace(is_array($data) ? $data : []);
        }
    });

    $app->before(static function (Request $request, Application $app) {
        $xc5Cookie = $request->cookies->get(
            $app['config']['xc_cookie_name']
        );

        /** @var \XCart\Bus\Client\XCart $client */
        $client = $app[\XCart\Bus\Client\XCart::class];

        $client->setAuthCookie($xc5Cookie);
    });

    $app->before(static function (Request $request, Application $app) {
        $app['x_cart.bus.user_token'] = $request->cookies->get('bus_token');

        $app['x_cart.bus.token_data'] = $app[\XCart\Bus\Auth\TokenService::class]->decodeToken(
            $app['x_cart.bus.user_token']
        );
    });

    $app->get('/', static function (Request $request, Application $app) {
        $config = $app['config'];

        /** @var \XCart\Bus\Query\Data\InstalledModulesDataSource $installedModulesDataSource */
        $installedModulesDataSource = $app[\XCart\Bus\Query\Data\InstalledModulesDataSource::class];
        $service                    = $installedModulesDataSource->find('XC-Service');

        $domain              = $config['domain'];
        $webdir              = $config['webdir'];
        $developerMode       = $config['developer_mode'] ? 'true' : 'false';
        $ignoreSystemModules = $config['ignore_system_modules'] ? 'true' : 'false';
        $adminScript         = $config['admin_script'];
        $resourcesPath       = $webdir . '/service/static/';
        $cssResource         = $resourcesPath . 'service.css?' . $service['version'];
        $jsResource          = $resourcesPath . 'service.js?' . $service['version'];
        $favicon             = $resourcesPath . 'favicon.ico';
        $appicon             = $resourcesPath . 'icon192x192.png';

        /** @var \XCart\Bus\Query\Resolver\LanguageDataResolver $languageResolver */
        $languageResolver = $app[\XCart\Bus\Query\Resolver\LanguageDataResolver::class];

        $languages    = $languageResolver->getLanguages(null, [], null, new ResolveInfo([]));
        $languageCode = $request->get('locale') ?: $request->cookies->get('locale', 'en');
        $languageCode = in_array($languageCode, $languages, true) ? $languageCode : 'en';

        $messages = $languageResolver->getLanguageMessages(null, ['code' => $languageCode], null, new ResolveInfo([]));

        $languageMessages = [];
        foreach ($messages as $label) {
            $languageMessages[$label['name']] = $label['label'];
        }
        $languageMessages = json_encode($languageMessages);

        $response = <<<HTML
<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8>
        <title>X-Cart online store builder</title>
        <link href={$cssResource} rel=stylesheet>
        <link rel="shortcut icon" href="{$favicon}" type="image/x-icon" />
        <link rel="icon" sizes="192x192" href="{$appicon}"/>
        <link rel="apple-touch-icon" sizes="192x192" href="{$appicon}">
    </head>
    <body>
        <div id=app></div>
        <script type=text/javascript>
            window.config = {
              host: "{$domain}",
              webdir: "{$webdir}",
              adminScript: "{$adminScript}",
              developerMode: {$developerMode},
              ignoreSystemModules: {$ignoreSystemModules},
              languages: ['{$languageCode}'],
              messages: {
                {$languageCode}: {$languageMessages}
              }
            }
        </script>
        <script type=text/javascript src={$jsResource}></script>
    </body>
</html>
HTML;

        return new Response($response, 200);
    });

    return $app;
};
