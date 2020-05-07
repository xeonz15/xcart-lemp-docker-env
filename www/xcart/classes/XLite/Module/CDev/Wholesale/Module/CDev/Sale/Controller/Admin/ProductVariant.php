<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\CDev\Wholesale\Module\CDev\Sale\Controller\Admin;

/**
 * Product variant
 *
 * @Decorator\Depend("XC\ProductVariants")
 */
class ProductVariant extends \XLite\Module\XC\ProductVariants\Controller\Admin\ProductVariant implements \XLite\Base\IDecorator
{
    /**
     * Check if warning message about availability of sales
     *
     * @return boolean
     */
    public function isWarningMessageEnabled()
    {
        return $this->getProductVariant()->getDiscountType() === $this->getProduct()::SALE_DISCOUNT_TYPE_PRICE
            && $this->getProductVariant()->getSalePriceValue();
    }

    /**
     * Get Warning Message with current absolute Sale Price for Product Variant/Product
     *
     * @return string
     */

    public function getWholesaleWarningMessage()
    {
        $value = $this->getViewer()->formatPrice($this->getProductVariant()->getSalePriceValue());

        return static::t('Wholesale prices for this product variant are disabled because its sale price is set as an absolute value {{X}}. To enable wholesale prices, use the relative value in % for the Sale field.', ['X' => $value]);
    }
}
