<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\YandexCheckout\Controller\Admin;

use XLite\Core\Database;
use XLite\Module\XC\YandexCheckout\Model\Payment\Processor\YandexCheckout;

/**
 * Payment method
 */
abstract class PaymentMethod extends \XLite\Controller\Admin\PaymentMethod implements \XLite\Base\IDecorator
{
    /**
     * @param \XLite\Model\Payment\Method $method
     *
     * @return boolean
     */
    protected static function isReturnActionAvailable(\XLite\Model\Payment\Method $method)
    {
        return in_array(
            $method->getServiceName(),
            YandexCheckout::getRefundableMethods(),
            true
        );
    }

    /**
     * @param \XLite\Model\Payment\Method $sourceMethod
     * @param string[] $serviceNames
     * @param string[] $settingNames
     * @throws \Exception
     */
    protected static function shareSettings($sourceMethod, $serviceNames, $settingNames)
    {
        /** @var \XLite\Model\Payment\Method[] $methods */
        $methods = Database::getRepo('XLite\Model\Payment\Method')
            ->findBy(['service_name' => array_diff($serviceNames, [$sourceMethod->getServiceName()])]);

        $settings = [];
        foreach ($settingNames as $name) {
            $settings[$name] = $sourceMethod->getSetting($name);
        }

        foreach ($methods as $method) {
            foreach ($settings as $name => $value) {
                $method->setSetting($name, $value);
            }
        }

        Database::getEM()->flush();
    }

    /**
     * Update payment method
     * @throws \Exception
     */
    protected function doActionUpdate()
    {
        parent::doActionUpdate();

        $method = $this->getPaymentMethod();
        if ($method->getProcessor() instanceof YandexCheckout) {
            $serviceNames = array_keys(YandexCheckout::getMethodNames());

            static::shareSettings(
                $method,
                $serviceNames,
                ['type', 'shopId', 'scid', 'prefix', 'sendReceiptData', 'defaultVATRate']
            );
        }
    }
}
