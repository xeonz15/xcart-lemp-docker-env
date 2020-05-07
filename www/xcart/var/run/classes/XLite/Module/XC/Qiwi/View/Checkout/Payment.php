<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\Qiwi\View\Checkout;

/**
 * Payment template
 */
abstract class Payment extends \XLite\View\Checkout\PaymentAbstract implements \XLite\Base\IDecorator
{
    /**
     * Register JS files
     *
     * @return array
     */
    public function getJSFiles()
    {
        $list = parent::getJSFiles();

        $list[] = 'modules/XC/Qiwi/input.js';

        return $list;
    }

}
