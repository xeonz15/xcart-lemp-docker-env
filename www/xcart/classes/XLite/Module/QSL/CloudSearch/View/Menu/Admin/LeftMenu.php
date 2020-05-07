<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\QSL\CloudSearch\View\Menu\Admin;

/**
 * Left menu widget
 */
class LeftMenu extends \XLite\View\Menu\Admin\LeftMenu implements \XLite\Base\IDecorator
{
    /**
     * Define items
     *
     * @return array
     */
    protected function defineItems()
    {
        $list = parent::defineItems();

        if (isset($list['catalog'])) {
            $list['catalog'][static::ITEM_CHILDREN]['cloud_search'] = [
                static::ITEM_TITLE      => 'CloudSearch & CloudFilters',
                static::ITEM_TARGET     => 'module',
                static::ITEM_EXTRA      => ['moduleId' => 'QSL-CloudSearch'],
                static::ITEM_PERMISSION => 'manage catalog',
                static::ITEM_WEIGHT     => 440,
            ];
        }

        return $list;
    }
}
