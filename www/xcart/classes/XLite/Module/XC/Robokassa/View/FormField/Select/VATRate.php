<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\Robokassa\View\FormField\Select;

/**
 * VAT Rate
 */
class VATRate extends \XLite\View\FormField\Select\Regular
{
    const PARAM_SHOW_PLACEHOLDER = 'showPlaceholder';

    protected function defineWidgetParams()
    {
        parent::defineWidgetParams();

        $this->widgetParams += [
            static::PARAM_SHOW_PLACEHOLDER => new \XLite\Model\WidgetParam\TypeBool('Show placeholder', true),
        ];
    }

    /**
     * @return array
     */
    protected function getDefaultOptions()
    {
        return [
            'none'   => static::t('No VAT'),
            'vat0'   => static::t('0% VAT'),
            'vat10'  => static::t('10% VAT'),
            'vat18'  => static::t('18% VAT'),
            'vat110' => static::t('10/110 VAT'),
            'vat118' => static::t('18/118 VAT'),
        ];
    }

    /**
     * @return array
     */
    protected function getOptions()
    {
        return ($this->getParam(static::PARAM_SHOW_PLACEHOLDER) ? ['' => static::t('Default VAT Rate')] : [])
            + parent::getOptions();
    }
}
