<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\Robokassa\Model\Payment;

use XLite\Core\Config;

/**
 * Payment method model
 * @Decorator\Depend("CDev\VAT")
 */
class Method extends \XLite\Model\Payment\Method implements \XLite\Base\IDecorator
{
    /**
     * Get message why we can't switch payment method
     *
     * @return string
     */
    public function getNotSwitchableReason()
    {
        $message   = parent::getNotSwitchableReason();
        $processor = $this->getProcessor();

        if ($processor
            && $this->getServiceName() === 'Robokassa'
        ) {
            $configured = $this->getSetting('login')
                && $this->getSetting('password1')
                && $this->getSetting('password2');

            if ($configured
                && !Config::getInstance()->CDev->VAT->display_prices_including_vat
            ) {
                $message = static::t(
                    'Robokassa cannot be used because the option "Display prices in catalog including VAT / GST" in VAT settings is disabled.',
                    ['url' => \XLite\Core\Converter::buildURL('vat_tax')]
                );
            } else {
                $message = static::t('The Robokassa is not configured and cannot be used.');
            }
        }

        return $message;
    }
}
