<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\Onboarding\Core;
use XLite\Core\Cache\ExecuteCached;

/**
 * MailChimp core class
 */
class WizardState extends \XLite\Base\Singleton
{
    const COOKIE_CURRENT_PROGRESS = 'Wizard_currentProgress';
    const COOKIE_MAX_PROGRESS = 'Wizard_maxProgress';
    const COOKIE_LANDMARKS = 'Wizard_landmarks';
    const COOKIE_LASTLOGO = 'Wizard_lastLogo';

    /**
     * Returns current wizard step
     */
    public function getWizardStep()
    {
        return $this->getCurrentStep();
    }

    public function getCurrentStep()
    {
        return \XLite\Core\Request::getInstance()->{self::COOKIE_CURRENT_PROGRESS} ?: 'intro';
    }

    public function setCurrentStep($stepName)
    {
        $steps = array_keys($this->defineWizardSteps());
        return in_array($stepName, $steps, true)
            ? \XLite\Core\Request::getInstance()->setCookie(self::COOKIE_CURRENT_PROGRESS, $stepName)
            : false;
    }

    public function getMaxAchievedStep()
    {
        return \XLite\Core\Request::getInstance()->{self::COOKIE_MAX_PROGRESS} ?: $this->getCurrentStep();
    }

    public function getWizardProgress()
    {
        $step = $this->getMaxAchievedStep();

        $steps = $this->defineWizardSteps();

        if (isset($steps[$step])) {
            return $steps[$step]['progress'];
        }

        return 0;
    }

    /**
     * Defines all available wizard steps
     *
     * @return array
     */
    public function defineWizardSteps()
    {
        return [
            'intro'              => [
                'progress' => 0,
                'name'     => 'Intro',
                'body'     => 'XLite\Module\XC\Onboarding\View\WizardStep\Intro',
            ],
            'add_product'        => [
                'progress' => 10,
                'name'     => 'Product',
                'body'     => 'XLite\Module\XC\Onboarding\View\WizardStep\AddProduct',
            ],
            'product_added'      => [
                'progress' => 20,
                'name'     => 'Product added',
                'body'     => 'XLite\Module\XC\Onboarding\View\WizardStep\ProductAdded',
            ],
            'company_logo'       => [
                'progress' => 30,
                'name'     => 'Logo upload',
                'body'     => 'XLite\Module\XC\Onboarding\View\WizardStep\CompanyLogo',
            ],
            'company_logo_added' => [
                'progress' => 35,
                'name'     => 'Logo confirmation',
                'body'     => 'XLite\Module\XC\Onboarding\View\WizardStep\CompanyLogoAdded',
            ],
            'location'           => [
                'progress' => 50,
                'name'     => 'Location',
                'body'     => 'XLite\Module\XC\Onboarding\View\WizardStep\Location',
            ],
            'company_info'       => [
                'progress' => 55,
                'name'     => 'Company info',
                'body'     => 'XLite\Module\XC\Onboarding\View\WizardStep\CompanyInfo',
            ],
            'shipping'           => [
                'progress' => 70,
                'name'     => 'Shipping type',
                'body'     => 'XLite\Module\XC\Onboarding\View\WizardStep\Shipping',
            ],
            'shipping_rates'     => [
                'progress' => 75,
                'name'     => 'Shipping method/rate',
                'body'     => 'XLite\Module\XC\Onboarding\View\WizardStep\ShippingRates',
            ],
            'shipping_done'     => [
                'progress' => 80,
                'name'     => 'Shipping success',
                'body'     => 'XLite\Module\XC\Onboarding\View\WizardStep\ShippingDone',
            ],
            'payment'     => [
                'progress' => 90,
                'name'     => 'Payment',
                'body'     => 'XLite\Module\XC\Onboarding\View\WizardStep\Payment',
            ],
            'done'     => [
                'progress' => 100,
                'name'     => 'Wizard completed',
                'body'     => 'XLite\Module\XC\Onboarding\View\WizardStep\Done',
            ],
        ];
    }

    public function getDemoEntityTypes()
    {
        return [
            'XLite\Model\Order',
            'XLite\Model\Product',
            'XLite\Model\Category'
        ];
    }

    /**
     * Checks if store contains demo catalog
     * @return boolean
     */
    public function hasDemoCatalog()
    {
        return ExecuteCached::executeCachedRuntime(function() {
            $types = $this->getDemoEntityTypes();

            foreach ($types as $type) {
                $repo = \XLite\Core\Database::getRepo($type);

                if (method_exists($repo, 'getDemoEntitiesCount')) {
                    $count = $repo->getDemoEntitiesCount();

                    if ($count > 0) {
                        return true;
                    }
                }
            }

            return false;
        }, ['OnboardingWizard::hasDemoCatalog']);
    }

    public function deleteDemoCatalog()
    {
        $types = $this->getDemoEntityTypes();

        foreach ($types as $type) {
            $repo = \XLite\Core\Database::getRepo($type);

            if (method_exists($repo, 'deleteDemoEntities')) {
                $repo->deleteDemoEntities();
            }
        }
    }

    public function getConfigOption($key)
    {
        return \XLite\Core\Config::getInstance()->XC->Onboarding->{$key};
    }

    public function updateConfigOption($key, $value)
    {
        \XLite\Core\Database::getRepo('\XLite\Model\Config')->createOption([
            'category' => 'XC\Onboarding',
            'name'     => $key,
            'value'    => $value,
        ]);
    }

    public function getLastAddedProductId()
    {
        return \XLite\Core\Session::getInstance()->onboardingLastAddedProductId;
    }

    public function setLastAddedProductId($id)
    {
        \XLite\Core\Session::getInstance()->onboardingLastAddedProductId = $id;
    }

    public function reset()
    {
        WizardState::setLastAddedProductId(null);
        \XLite\Core\Request::getInstance()->setCookie(self::COOKIE_CURRENT_PROGRESS, null);
        \XLite\Core\Request::getInstance()->setCookie(self::COOKIE_MAX_PROGRESS, null);
        \XLite\Core\Request::getInstance()->setCookie(self::COOKIE_LASTLOGO, null);
        \XLite\Core\Request::getInstance()->setCookie(self::COOKIE_LANDMARKS, null);
        WizardState::getInstance()->updateConfigOption('wizard_state', 'visible');
        WizardState::getInstance()->setLastAddedProductId(null);
    }
}
