<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\YandexCheckout\Model;

/**
 * TaxClass
 */
 class TaxClass extends \XLite\Model\TaxClassAbstract implements \XLite\Base\IDecorator
{
    const VAT_NONE = '1';
    const VAT_0 = '2';
    const VAT_10 = '3';
    const VAT_20 = '4';
    const VAT_10_110 = '5';
    const VAT_20_120 = '6';

    /**
     * Yandex money VAT rate
     *
     * @var integer
     *
     * @Column (type="integer")
     */
    protected $yandexMoneyVATRate;

    /**
     * @return int
     */
    public function getYandexMoneyVATRate()
    {
        return $this->yandexMoneyVATRate;
    }

    /**
     * @param int $yandexMoneyVATRate
     */
    public function setYandexMoneyVATRate($yandexMoneyVATRate)
    {
        $this->yandexMoneyVATRate = $yandexMoneyVATRate;
    }
}
