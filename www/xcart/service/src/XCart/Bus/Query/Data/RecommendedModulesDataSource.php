<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XCart\Bus\Query\Data;

use XCart\Marketplace\Request\Notifications;
use XCart\SilexAnnotations\Annotations\Service;

/**
 * @Service\Service()
 */
class RecommendedModulesDataSource extends AMarketplaceDataSetSource
{
    const TYPE_MODULE = 'module';

    /**
     * @return string
     */
    protected function getRequest(): string
    {
        return Notifications::class;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        $data = parent::getAll();
        $data = array_filter($data, static function ($item) {
            return $item['type'] === static::TYPE_MODULE;
        });

        return $data;
    }

    /**
     * @param string $target
     * @param string $page
     *
     * @return array
     */
    public function findByTarget(string $target, string $page = ''): array
    {
        $modules = $this->getAll();

        return array_filter($modules, static function ($module) use ($target, $page) {
            $itemTarget = $module['pageParams']['target'] ?? '';
            $itemPage   = $module['pageParams']['page'] ?? '';

            return
                (empty($itemTarget) || $itemTarget === ($target ?? ''))
                & (empty($itemPage) || $itemPage === ($page ?? ''));
        });
    }
}