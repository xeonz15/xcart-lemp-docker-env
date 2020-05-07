<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\YandexCheckout\View\FormField\Select;

/**
 * CustomerContactMode
 */
class CustomerContactMode extends \XLite\View\FormField\Select\Regular
{
    /**
     * @return array
     */
    protected function getDefaultOptions()
    {
        return [
            'email' => static::t('[customer_contact_yandex] Email'),
            'phone' => static::t('[customer_contact_yandex] Phone'),
        ];
    }
}
