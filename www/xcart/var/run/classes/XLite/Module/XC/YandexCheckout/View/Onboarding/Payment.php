<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\YandexCheckout\View\Onboarding;


class Payment extends \XLite\View\AView
{
    protected function isVisible()
    {
        return parent::isVisible()
            && $this->getMethod()
            && $this->getMethod()->getAdded();
    }

    protected function getDefaultTemplate()
    {
        return 'modules/XC/YandexCheckout/onboarding/body.twig';
    }

    public function getJSFiles()
    {
        $list = parent::getJSFiles();
            $list[] = 'modules/XC/YandexCheckout/onboarding/app.js';

        return $list;
    }

    public function getCSSFiles()
    {
        $list = parent::getCSSFiles();
            $list[] = 'modules/XC/YandexCheckout/onboarding/style.less';

        return $list;
    }

    /**
     * @return null|\XLite\Model\Payment\Method
     */
    protected function getMethod()
    {
        return \XLite\Core\Database::getRepo('XLite\Model\Payment\Method')->findOneBy([
            'service_name' => 'YandexCheckout.bank_card'
        ]);
    }

    /**
     * @return string
     */
    protected function getMethodSettingsUrl()
    {
        return $this->getMethod()->getProcessor()->getConfigurationURL($this->getMethod());
    }

    /**
     * @return bool
     */
    protected function isMethodConfigured()
    {
        return $this->getMethod() && $this->getMethod()->getProcessor()->isConfigured($this->getMethod());
    }

    /**
     * @return bool
     */
    protected function isMethodEnabled()
    {
        return $this->getMethod() && $this->getMethod()->isEnabled();
    }

    /**
     * @return integer
     */
    protected function getMethodId()
    {
        return $this->getMethod()->getMethodId();
    }
}