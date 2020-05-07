<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\YandexCheckout\View\FormField\Select;

/**
 * VAT Rate
 */
class VATRate extends \XLite\View\FormField\Select\Regular
{
    const PARAM_SHOW_PLACEHOLDER = 'showPlaceholder';

    protected function defineWidgetParams()
    {
        parent::defineWidgetParams();

        $this->widgetParams += array(
            static::PARAM_SHOW_PLACEHOLDER => new \XLite\Model\WidgetParam\TypeBool('Show placeholder', true),
        );
    }

    /**
     * @return array
     */
    protected function getDefaultOptions()
    {
        return [
            '1' => static::t('No VAT'),
            '2' => static::t('0% VAT'),
            '3' => static::t('10% VAT'),
            '4' => static::t('20% VAT'),
            '5' => static::t('10/110 VAT'),
            '6' => static::t('20/120 VAT'),
        ];
    }

    /**
     * @return array
     */
    protected function getOptions()
    {
        return ($this->getParam(static::PARAM_SHOW_PLACEHOLDER) ? ['0' => static::t('Default VAT Rate')] : [])
            + parent::getOptions();
    }
}
