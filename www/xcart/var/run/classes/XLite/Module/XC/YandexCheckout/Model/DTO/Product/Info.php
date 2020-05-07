<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\YandexCheckout\Model\DTO\Product;


 class Info extends \XLite\Model\DTO\Product\InfoAbstract implements \XLite\Base\IDecorator
{
    /**
     * @inheritdoc
     */
    protected function init($object)
    {
        parent::init($object);

        $ymPaymentSubject = $object->getYMPaymentSubject();
        if (!$ymPaymentSubject) {
            $ymPaymentSubject = \XLite\Model\Product::YM_DEFAULT_SUBJECT;
        }

        $this->prices_and_inventory->YMPaymentSubject = $ymPaymentSubject;
    }

    /**
     * @inheritdoc
     */
    public function populateTo($object, $rawData = null)
    {
        parent::populateTo($object, $rawData);

        $object->setYMPaymentSubject((string) $this->prices_and_inventory->YMPaymentSubject);
    }
}