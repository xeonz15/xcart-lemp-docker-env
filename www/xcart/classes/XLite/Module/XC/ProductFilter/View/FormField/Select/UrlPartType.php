<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\ProductFilter\View\FormField\Select;


/**
 * UrlPartType
 */
class UrlPartType extends \XLite\View\FormField\Select\Regular
{
    const TYPE_HASH = 'H';
    const TYPE_GET  = 'G';

    /**
     * Get default options
     *
     * @return array
     */
    protected function getDefaultOptions()
    {
        return [
            static::TYPE_GET => static::t('Get params'),
            static::TYPE_HASH => static::t('Hash'),
        ];
    }
}
