<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\YandexCheckout\View\FormModel\Product;


/**
 * Product form model
 */
 class Info extends \XLite\View\FormModel\Product\InfoAbstract implements \XLite\Base\IDecorator
{
    /**
     * @return array
     */
    protected function defineFields()
    {
        $ymSubjectOptions = \XLite\Module\XC\YandexCheckout\Main::getYMPaymentSubjectOptions();

        $schema = parent::defineFields();
        $schema['prices_and_inventory']['YMPaymentSubject'] = [
            'label'             => static::t('Payment subject'),
            'type'              => 'Symfony\Component\Form\Extension\Core\Type\ChoiceType',
            'choices'           => array_flip($ymSubjectOptions),
            'placeholder'       => false,
            'position'          => 500,
        ];

        return $schema;
    }
}