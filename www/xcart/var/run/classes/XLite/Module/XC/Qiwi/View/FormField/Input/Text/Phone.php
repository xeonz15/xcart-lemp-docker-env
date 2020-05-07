<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\Qiwi\View\FormField\Input\Text;

use XLite\Module\XC\Qiwi\Model\Payment\Processor\Qiwi;

/**
 * Qiwi phone number field
 */
class Phone extends \XLite\View\FormField\Input\Text
{
    /**
     * Register JS files
     *
     * @return array
     */
    public function getJSFiles()
    {
        $list = parent::getJSFiles();

        $list[] = 'modules/XC/Qiwi/input.js';

        return $list;
    }

    /**
     * Define widget params
     *
     * @return void
     */
    protected function defineWidgetParams()
    {
        parent::defineWidgetParams();

        $this->widgetParams[static::PARAM_REQUIRED]->setValue(true);
    }

    /**
     * Assemble validation rules
     *
     * @return array
     */
    protected function assembleValidationRules()
    {
        $rules = parent::assembleValidationRules();

        $rules[] = 'funcCall[checkQiwiPhoneNumber]';

        return $rules;
    }

    /**
     * Get default name
     *
     * @return string
     */
    protected function getDefaultName()
    {
        return 'payment[' . Qiwi::PHONE_NUMBER_FIELD . ']';
    }

    /**
     * Get default label
     *
     * @return string
     */
    protected function getDefaultLabel()
    {
        return 'Mobile phone number';
    }

    /**
     * Get default maximum size
     *
     * @return integer
     */
    protected function getDefaultMaxSize()
    {
        return 20;
    }

    /**
     * Sets shipping address phone as default for Qiwi phone number
     *
     * @return integer
     */
    protected function getDefaultValue()
    {
        $phone = '';

        $controller = \XLite::getController();

        $profile = $controller->getCart()->getProfile();

        if ($profile) {
            $address = $profile->getShippingAddress();

            if ($address) {
                $phone = $address->getPhone();
            }
        }

        return $phone;
    }
}
