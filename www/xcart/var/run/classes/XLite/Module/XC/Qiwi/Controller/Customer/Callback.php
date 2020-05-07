<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\Qiwi\Controller\Customer;

/**
 * Payment method callback
 */
abstract class Callback extends \XLite\Module\XC\Robokassa\Controller\Customer\Callback implements \XLite\Base\IDecorator
{
    /**
     * Suppress output for Qiwi callback processing
     *
     * @return void
     */
    protected function doActionCallback()
    {
        parent::doActionCallback();

        if ($this->transaction) {
            $processor = $this->transaction->getPaymentMethod()->getProcessor();

            if ($processor instanceof \XLite\Module\XC\Qiwi\Model\Payment\Processor\Qiwi) {
                $this->setSuppressOutput(true);
            }
        }
    }
}
