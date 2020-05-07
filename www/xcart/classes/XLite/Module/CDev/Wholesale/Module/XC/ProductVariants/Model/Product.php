<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\CDev\Wholesale\Module\XC\ProductVariants\Model;

use Includes\Utils\Module\Manager;

/**
 * Product
 *
 * @Decorator\Depend({"XC\ProductVariants"})
 */
class Product extends \XLite\Model\Product implements \XLite\Base\IDecorator
{
    /**
     * Check if wholesale prices are enabled for the specified product.
     * Return true if product is not on sale (Sale module)
     *
     * @return boolean
     */
    public function isWholesalePricesEnabled()
    {
        if ($this->getSelectedVariant()) {
            return ($this->getSelectedVariant()->getDiscountType() === $this::SALE_DISCOUNT_TYPE_PERCENT)
                || ($this->getSelectedVariant()->getDiscountType() === $this::SALE_DISCOUNT_TYPE_PRICE && !$this->getSelectedVariant()->getSalePriceValue());
        } else {
            return !Manager::getRegistry()->isModuleEnabled('CDev-Sale')
                || !$this->getParticipateSale()
                || ($this->getDiscountType() === $this::SALE_DISCOUNT_TYPE_PERCENT);
        }
    }
}
