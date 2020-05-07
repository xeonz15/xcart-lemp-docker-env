<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\CDev\RuTranslation\View\Tabs;

/**
 * Tabs related to shipping
 *
 */
 class Shipping extends \XLite\View\Tabs\ShippingAbstract implements \XLite\Base\IDecorator
{
    /**
     * @return array
     */
    protected function defineTabs()
    {
        $tabs = parent::defineTabs();

        if (\XLite\Module\CDev\RuTranslation\Main::isActiveLanguage()) {
            unset(
                $tabs['automate_shipping_refunds'],
                $tabs['automate_shipping_routine'],
                $tabs['packaging_supplies']
            );
        }

        return $tabs;
    }

}