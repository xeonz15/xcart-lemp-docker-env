<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\Robokassa\Model\Payment\Processor;

use XLite\Model\Payment\Method;

/**
 * Robokassa payment processor
 * @Decorator\Depend("CDev\VAT")
 */
class RobokassaVAT extends \XLite\Module\XC\Robokassa\Model\Payment\Processor\Robokassa implements \XLite\Base\IDecorator
{
    /**
     * Check - payment method is configured or not
     *
     * @param \XLite\Model\Payment\Method $method Payment method
     *
     * @return boolean
     */
    public function isConfigured(Method $method)
    {
        return parent::isConfigured($method)
            && \XLite\Core\Config::getInstance()->CDev->VAT->display_prices_including_vat;
    }
}
