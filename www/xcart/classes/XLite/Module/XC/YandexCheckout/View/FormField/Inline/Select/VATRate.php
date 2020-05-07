<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\YandexCheckout\View\FormField\Inline\Select;

/**
 * VAT Rate
 */
class VATRate extends \XLite\View\FormField\Inline\Base\Single
{
    /**
     * @return string
     */
    protected function defineFieldClass()
    {
        return 'XLite\Module\XC\YandexCheckout\View\FormField\Select\VATRate';
    }

    /**
     * Check - field is editable or not
     *
     * @return boolean
     */
    protected function hasSeparateView()
    {
        return false;
    }
}
