<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

return function()
{
    $options = \XLite\Core\Database::getRepo('XLite\Model\LanguageLabelTranslation')->findBy([
        'label' => [
            'https://kb.x-cart.ru/taxes/setting_up_sales_tax.html',
            'Настройка НДС (VAT / GST)',
            'Настройка налога с продаж'
        ],
        'code' => 'ru'
    ]);

    foreach ($options as $option) {
        \XLite\Core\Database::getEM()->remove($option);
    }

    // Loading data to the database from yaml file
    $yamlFile = __DIR__ . LC_DS . 'post_rebuild.yaml';
    \XLite\Core\Database::getInstance()->loadFixturesFromYaml($yamlFile);

    \XLite\Core\Database::getEM()->flush();
};
