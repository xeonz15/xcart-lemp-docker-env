<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\Robokassa\Model;

/**
 * TaxClass
 */
class TaxClass extends \XLite\Model\TaxClass implements \XLite\Base\IDecorator
{
    /**
     * Robokassa VAT rate
     *
     * @var integer
     *
     * @Column (type="string", length=32)
     */
    protected $robokassaVATRate;

    /**
     * @return int
     */
    public function getRobokassaVATRate()
    {
        return $this->robokassaVATRate;
    }

    /**
     * @param int $robokassaVATRate
     */
    public function setRobokassaVATRate($robokassaVATRate)
    {
        $this->robokassaVATRate = $robokassaVATRate;
    }
}
