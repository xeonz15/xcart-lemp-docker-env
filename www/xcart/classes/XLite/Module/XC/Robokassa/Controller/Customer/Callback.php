<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\Robokassa\Controller\Customer;

/**
 * Payment method callback
 */
abstract class Callback extends \XLite\Controller\Customer\Callback implements \XLite\Base\IDecorator
{
    /**
     * Suppress output for Robokassa callback processing
     *
     * @return void
     */
    protected function doActionCallback()
    {
        parent::doActionCallback();

        if ($this->transaction) {
            $processor = $this->transaction->getPaymentMethod()->getProcessor();

            if ($processor instanceof \XLite\Module\XC\Robokassa\Model\Payment\Processor\Robokassa) {
                $this->setSuppressOutput(true);
            }
        }
    }
}
