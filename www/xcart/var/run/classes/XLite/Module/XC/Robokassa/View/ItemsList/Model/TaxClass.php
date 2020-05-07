<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\Robokassa\View\ItemsList\Model;

/**
 * Tax classes items list
 */
 class TaxClass extends \XLite\Module\XC\YandexCheckout\View\ItemsList\Model\TaxClass implements \XLite\Base\IDecorator
{
    /**
     * Define columns structure
     *
     * @return array
     */
    protected function defineColumns()
    {
        $result = parent::defineColumns();

        $result['robokassaVATRate'] = [
            static::COLUMN_NAME   => static::t('Robokassa'),
            static::COLUMN_CLASS   => 'XLite\Module\XC\Robokassa\View\FormField\Inline\Select\VATRate',
            static::COLUMN_ORDERBY => 200,
        ];

        return $result;
    }
}
