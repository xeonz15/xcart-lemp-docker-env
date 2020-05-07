<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\Webmoney\View\Payment;

use Includes\Utils\Converter;
use Includes\Utils\URLManager;

/**
 * Payment method
 */
abstract class Method extends \XLite\View\Payment\Method implements \XLite\Base\IDecorator
{
    /**
     * Get callback URL for WebMoney payment method
     * 
     * @return string
     */
    protected function getWebmoneyCallbackURL()
    {
        return URLManager::getShopURL(
            Converter::buildURL('callback', 'callback', array(), 'cart.php')
        );
    }
}
