<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\TwoFactorAuthentication\View\Model\Profile;

use XLite\Core\Config;

/**
 * Administrator profile model widget. This widget is used in the admin interface
 */
class AdminMain extends \XLite\View\Model\Profile\AdminMain implements \XLite\Base\IDecorator
{
    /**
     * Schema for authentication phone
     *
     * @var array
     */
    protected $auth_phone = [
        'auth_phone_code'   => [
            self::SCHEMA_CLASS       => '\XLite\Module\XC\TwoFactorAuthentication\View\FormField\Input\Text\PhoneCode',
            self::SCHEMA_LABEL       => 'Country phone code',
            self::SCHEMA_REQUIRED    => false,
            self::SCHEMA_PLACEHOLDER => '+1',
        ],
        'auth_phone_number' => [
            self::SCHEMA_CLASS       => '\XLite\View\FormField\Input\Text\Phone',
            self::SCHEMA_LABEL       => 'Phone number',
            self::SCHEMA_REQUIRED    => false,
            self::SCHEMA_PLACEHOLDER => '9178007060',
            self::SCHEMA_HELP        => 'Type your phone number here to receive a SMS code for two-factor-authentication',
        ],
    ];

    /**
     * Return fields list by the corresponding schema
     *
     * @return array
     */
    protected function getFormFieldsForSectionMain()
    {
        if (
            Config::getInstance()->XC->TwoFactorAuthentication->admin_interface
            || Config::getInstance()->XC->TwoFactorAuthentication->customer_interface
        ) {
            $this->mainSchema = array_merge($this->mainSchema, $this->auth_phone);
        }

        return parent::getFormFieldsForSectionMain();
    }
}