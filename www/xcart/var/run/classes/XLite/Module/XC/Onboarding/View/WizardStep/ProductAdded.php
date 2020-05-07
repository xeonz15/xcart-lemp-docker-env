<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\Onboarding\View\WizardStep;

use XLite\Module\XC\Onboarding\Core\WizardState;
use XLite\Module\XC\Onboarding\View\AWizardStep;

/**
 * Add product step
 */
class ProductAdded extends AWizardStep
{
    protected function isDemoCatalogAvailable()
    {
        return WizardState::getInstance()->hasDemoCatalog();
    }

    protected function getStorefrontUrlBase()
    {
        return \XLite::getInstance()->getShopURL(
            \XLite\Core\Converter::buildURL(
                'product',
                '',
                ['product_id' => 'PID'],
                \XLite::getCustomerScript()),
            \XLite\Core\Config::getInstance()->Security->customer_security
        );
    }

    protected function getStorefrontUrl()
    {
        if (WizardState::getInstance()->getLastAddedProductId()) {
            return \XLite::getInstance()->getShopURL(
                \XLite\Core\Converter::buildURL(
                    'product',
                    '',
                    ['product_id' => WizardState::getInstance()->getLastAddedProductId()],
                    \XLite::getCustomerScript()),
                \XLite\Core\Config::getInstance()->Security->customer_security
            );
        }

        return \XLite::getController()->getShopURL();
    }

    protected function getProductListUrl()
    {
        return \XLite::getController()->buildURL('product_list');
    }

    public function getJSFiles()
    {
        return array_merge(parent::getJSFiles(), [
            $this->getDir() . '/step.js'
        ]);
    }
}