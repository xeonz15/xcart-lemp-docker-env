<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\CDev\RuTranslation\View\Promo;


/**
 * FreeShippingHowTo
 *
 */
 class FreeShippingHowTo extends \XLite\View\Promo\FreeShippingHowToAbstract implements \XLite\Base\IDecorator
{
    /**
     * @return string
     */
    public function getFreeShippingHowToText()
    {
        if (\XLite\Module\CDev\RuTranslation\Main::isActiveLanguage()) {
            return static::t('How to set up free shipping help', ['url' => 'https://kb.x-cart.ru/shipping/free_shipping.html']);
        }

        return parent::getFreeShippingHowToText();
    }
}