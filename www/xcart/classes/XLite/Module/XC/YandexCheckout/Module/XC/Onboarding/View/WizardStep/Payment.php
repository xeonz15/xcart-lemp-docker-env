<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\YandexCheckout\Module\XC\Onboarding\View\WizardStep;

/**
 * Payment step
 *
 * @Decorator\Depend("XC\Onboarding")
 */
class Payment extends \XLite\Module\XC\Onboarding\View\WizardStep\Payment implements \XLite\Base\IDecorator
{
    const YA_SORT = 30;

    /**
     * @return array
     */
    protected function getOnlineWidgets()
    {
        $widgets = parent::getOnlineWidgets();
        $widgets[self::YA_SORT] = \XLite\Module\XC\YandexCheckout\View\Onboarding\Payment::class;

        return $widgets;
    }
}