<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\CDev\Wholesale\Module\CDev\Sale\Controller\Admin;

/**
 * Product controller
 *
 */
class Product extends \XLite\Controller\Admin\Product implements \XLite\Base\IDecorator
{
    /**
     * Check if warning message about availability of sales
     *
     * @return boolean
     */
    public function isWarningMessageEnabled()
    {
        return $this->getProduct()->getDiscountType() === $this->getProduct()::SALE_DISCOUNT_TYPE_PRICE
            && $this->getProduct()->getSalePriceValue();
    }

    /**
     * Get Warning Message with current absolute Sale Price for Product
     *
     * @return string
     */

    public function getWholesaleWarningMessage()
    {
        $value = $this->getViewer()->formatPrice($this->getProduct()->getSalePriceValue());

        return static::t('Wholesale prices for this product are disabled because its sale price is set as an absolute value {{X}}. To enable wholesale prices, use the relative value in % for the Sale field.', ['X' => $value]);
    }
}
