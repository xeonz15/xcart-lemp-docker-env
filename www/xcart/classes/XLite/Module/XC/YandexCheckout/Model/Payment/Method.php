<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\YandexCheckout\Model\Payment;

use XLite\Core\Config;
use XLite\Module\XC\YandexCheckout\Model\Payment\Processor\YandexCheckout;

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
            && array_key_exists($this->getServiceName(), YandexCheckout::getMethodNames())
        ) {
            if ($processor->isConfigured($this)
                && !Config::getInstance()->CDev->VAT->display_prices_including_vat
            ) {
                $message = static::t(
                    'Yandex.Checkout cannot be used because the option "Display prices in catalog including VAT / GST" in VAT settings is disabled.',
                    ['url' => \XLite\Core\Converter::buildURL('vat_tax')]
                );
            } else {
                $message = static::t('Yandex.Checkout is not configured and cannot be used.');
            }
        }

        return $message;
    }
}
