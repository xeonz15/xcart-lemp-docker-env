<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\CDev\RuTranslation\View\Tabs;

/**
 * Tabs related to shipping settings
 *
 */
 class ShippingType extends \XLite\View\Tabs\ShippingTypeAbstract implements \XLite\Base\IDecorator
{
    /**
     * @return array
     */
    protected function defineTabs()
    {
        $tabs = parent::defineTabs();
        
        if (\XLite\Module\CDev\RuTranslation\Main::isActiveLanguage()) {
            $tabs['carrier_calculated']['weight'] = 200;
            $tabs['custom_table']['weight'] = 100;
        }

        return $tabs;
        
    }

}
