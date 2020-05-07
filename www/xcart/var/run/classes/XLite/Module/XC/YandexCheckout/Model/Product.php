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
 class Product extends \XLite\Model\ProductAbstract implements \XLite\Base\IDecorator
{
    const YM_DEFAULT_SUBJECT = 'commodity';

    /**
     * Yandex money payment subject
     *
     * @var integer
     *
     * @Column (type="string")
     */
    protected $YMPaymentSubject = self::YM_DEFAULT_SUBJECT;

    /**
     * @return int
     */
    public function getYMPaymentSubject()
    {
        return $this->YMPaymentSubject;
    }

    /**
     * @param int $YMPaymentSubject
     */
    public function setYMPaymentSubject($YMPaymentSubject)
    {
        $this->YMPaymentSubject = $YMPaymentSubject;
    }

}
