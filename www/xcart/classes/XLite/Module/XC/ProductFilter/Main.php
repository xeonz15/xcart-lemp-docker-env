<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\ProductFilter;

abstract class Main extends \XLite\Module\AModule
{
    /**
     * Is use hash in url(else use URL)
     *
     * @return bool
     */
    public static function isUseHash()
    {
        return \XLite\Core\Config::getInstance()->XC->ProductFilter->url_part_type
            === \XLite\Module\XC\ProductFilter\View\FormField\Select\UrlPartType::TYPE_HASH;
    }
}
