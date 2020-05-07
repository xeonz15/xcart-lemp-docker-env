<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\YandexCheckout\View\Form\Payment\Method\Admin;

use XLite\Module\XC\YandexCheckout\Model\Payment\Processor\YandexCheckout;

/**
 * Payment method settings form
 */
 class Settings extends \XLite\View\Form\Payment\Method\Admin\SettingsAbstract implements \XLite\Base\IDecorator
{
    /**
     * @return boolean
     */
    protected function isMultipart()
    {
        /** @var \XLite\Model\Payment\Method $method */
        $method = \XLite\Core\Database::getRepo('XLite\Model\Payment\Method')
            ->find($this->getPaymentMethodId());

        if ($method->getProcessor() instanceof YandexCheckout) {
            return true;
        }

        return parent::isMultipart();
    }
}
