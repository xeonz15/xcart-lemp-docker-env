<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\CDev\Sale\View;

/**
 * Wholesale prices info box
 * @ListChild (list="wholesale_prices.info_message", zone="admin", weight="100")
 */
class WholesalePricesInfo extends \XLite\View\AView
{
    /**
     * Return widget default template
     *
     * @return string
     */
    protected function getDefaultTemplate()
    {
        return 'modules/CDev/Sale/wholesale_prices_info/body.twig';
    }

    protected function getInfoMessage()
    {
        $saleDiscounts = $this->getProduct()->getApplicableSaleDiscounts();
        $links = [];
        /** @var \XLite\Module\CDev\Sale\Model\SaleDiscount $discount */
        foreach ($saleDiscounts as $discount) {
            $links[] = $this->getSaleDiscountEditLink($discount)
                ? '<a href="' . $this->getSaleDiscountEditLink($discount) . '">' . $discount->getName() . '</a>'
                : $discount->getName();
        }

        return static::t('The following sale discounts apply to this product: X', ['sales' => implode(', ', $links)]);
    }

    /**
     * Check if widget is visible
     *
     * @return boolean
     */
    protected function isVisible()
    {
        return parent::isVisible()
            && !empty($this->getProduct()->getApplicableSaleDiscounts());
    }
}
