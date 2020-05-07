<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XCart\Bus\Query\Resolver;

use GraphQL\Type\Definition\ResolveInfo;
use XCart\Bus\Core\Annotations\Resolver;
use XCart\Bus\Domain\Module;
use XCart\Bus\Editions\Core\Trial;
use XCart\Bus\Query\Data\CoreConfigDataSource;
use XCart\Bus\Query\Data\ModulesDataSource;
use XCart\SilexAnnotations\Annotations\Service;

/**
 * @Service\Service()
 */
class TrialResolver
{
    /**
     * @var CoreConfigDataSource
     */
    private $coreConfigDataSource;

    /**
     * @var ModulesDataSource
     */
    private $modulesDataSource;

    /**
     * @var Trial
     */
    private $trial;

    /**
     * EditionsResolver constructor.
     *
     * @param CoreConfigDataSource $coreConfigDataSource
     * @param ModulesDataSource    $modulesDataSource
     * @param Trial                $trial
     */
    public function __construct(
        CoreConfigDataSource $coreConfigDataSource,
        ModulesDataSource $modulesDataSource,
        Trial $trial
    ) {
        $this->coreConfigDataSource = $coreConfigDataSource;
        $this->modulesDataSource    = $modulesDataSource;
        $this->trial                = $trial;
    }

    /** @noinspection MoreThanThreeArgumentsInspection */

    /**
     * @param             $value
     * @param             $args
     * @param             $context
     * @param ResolveInfo $info
     *
     * @return array
     *
     * @Resolver()
     */
    public function resolveTrialData($value, $args, $context, ResolveInfo $info): array
    {
        /** @var Module $module */
        $module   = $this->modulesDataSource->findOne('XC-Trial');
        $isActive = isset($module->enabled) && $module->enabled === true;

        return [
            'isActive'       => $isActive,
            'isExpired'      => $isActive
                ? $this->trial->isExpired()
                : false,
            'currentEdition' => (string) $this->coreConfigDataSource->currentEdition ?: 'ultimate',
        ];
    }
}
