<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\Concierge;

use XLite\Module\XC\Concierge\Core\Mediator;

abstract class Main extends \XLite\Module\AModule
{
    const DEFAULT_WRITE_KEY = '0Xhidk9qjbFQav8TRzHrzlIXXF0MjV4D';

    public static function init()
    {
        parent::init();

        if (\XLite\Core\Config::getInstance()->XC->Concierge->additional_config_loaded !== 'true') {
            $additionalConfig = LC_DIR_MODULES . 'XC' . LC_DS . 'Concierge' . LC_DS . 'config.yaml';

            if (\Includes\Utils\FileManager::isFileReadable($additionalConfig)) {
                \XLite\Core\Database::getInstance()->loadFixturesFromYaml($additionalConfig);
                \XLite\Core\Config::updateInstance();

            } else {
                static::fillDefaultConciergeOptions();
            }
        }

        if (Mediator::getInstance()->isConfigured()) {
            register_shutdown_function([Mediator::getInstance(), 'handleShutdown']);

            set_exception_handler(function ($exception) {
                Mediator::getInstance()->handleException($exception);
                \Includes\ErrorHandler::handleException($exception);
            });
        }
    }

    /**
     * Fill concierge config data with default key and first root admin email
     */
    public static function fillDefaultConciergeOptions()
    {
        // Search for first active root administrator
        $cnd = new \XLite\Core\CommonCell;
        $cnd->{\XLite\Model\Repo\Profile::SEARCH_PERMISSIONS} = \XLite\Model\Role\Permission::ROOT_ACCESS;
        $cnd->{\XLite\Model\Repo\Profile::P_ORDER_BY} = array('p.profile_id');
        $rootAdmins = \XLite\Core\Database::getRepo('XLite\Model\Profile')->search($cnd);

        $rootAdminEmail = null;

        if ($rootAdmins) {
            /** @var \XLite\Model\Profile $admin */
            foreach ($rootAdmins as $admin) {
                if ($admin->isAdmin() && $admin->isEnabled()) {
                    $rootAdminEmail = $admin->getLogin();
                    break;
                }
            }
        }

        if ($rootAdminEmail) {
            \XLite\Core\Database::getRepo('XLite\Model\Config')->createOptions(
                [
                    [
                        'category' => 'XC\Concierge',
                        'name'     => 'write_key',
                        'value'    => static::DEFAULT_WRITE_KEY,
                    ],
                    [
                        'category' => 'XC\Concierge',
                        'name'     => 'user_id',
                        'value'    => $rootAdminEmail,
                    ],
                    [
                        'category' => 'XC\Concierge',
                        'name'     => 'additional_config_loaded',
                        'value'    => 'true',
                    ],
                ]
            );
        }
    }
}
