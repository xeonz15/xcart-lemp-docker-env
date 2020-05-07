<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\YandexCheckout\Logic\Import\Processor;

/**
 * Products
 */
abstract class Products extends \XLite\Logic\Import\Processor\ProductsAbstract implements \XLite\Base\IDecorator
{
    /**
     * Get messages
     *
     * @return array
     */
    public static function getMessages()
    {
        return parent::getMessages()
            + [
                'PRODUCT-YM-PAYMENT-SUBJECT-FMT'    => 'Invalid payment subject value',
            ];
    }

    /**
     * Get error texts
     *
     * @return array
     */
    public static function getErrorTexts()
    {
        return parent::getErrorTexts()
            + array(
                'PRODUCT-YM-PAYMENT-SUBJECT-FMT'    => 'Default payment subject will be assigned',
            );
    }

    // {{{ Columns

    /**
     * Define columns
     *
     * @return array
     */
    protected function defineColumns()
    {
        $columns = parent::defineColumns();

        $columns['YMPaymentSubject'] = [];

        return $columns;
    }

    // }}}

    /**
     * Verify 'YMPaymentSubject' value
     *
     * @param mixed $value  Value
     * @param array $column Column info
     *
     * @return void
     */
    protected function verifyYMPaymentSubject($value, array $column)
    {
        if (!$this->verifyValueAsEmpty($value) && !$this->verifyValueAsYMPaymentSubject($value)) {
            $this->addWarning('PRODUCT-YM-PAYMENT-SUBJECT-FMT', ['column' => $column, 'value' => $value]);
        }
    }

    /**
     * Normalize 'YMPaymentSubject' value
     *
     * @param mixed @value Value
     *
     * @return float
     */
    protected function normalizeYMPaymentSubjectValue($value)
    {
        $availableOptions = \XLite\Module\XC\YandexCheckout\Main::getYMPaymentSubjectOptions();

        return in_array($value, array_keys($availableOptions)) ? $value : \XLite\Model\Product::YM_DEFAULT_SUBJECT;
    }

    /**
     * Verify value as Yandex.Kassa payment subject value
     *
     * @param mixed @value Value
     *
     * @return boolean
     */
    protected function verifyValueAsYMPaymentSubject($value)
    {
        $availableOptions = \XLite\Module\XC\YandexCheckout\Main::getYMPaymentSubjectOptions();

        return in_array($value, array_keys($availableOptions));
    }
}
