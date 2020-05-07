<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\CDev\Paypal\View\WelcomeBlock;

/**
 * Paypal banner
 *
 * @ListChild (list="dashboard-center", zone="admin", weight="20")
 */
class Paypal extends \XLite\View\AWelcomeBlock
{
    /**
     * Return list of allowed targets
     *
     * @return array
     */
    public static function getAllowedTargets()
    {
        return array_merge(parent::getAllowedTargets(), array('main'));
    }

    /**
     * Add widget specific CSS files
     *
     * @return array
     */
    public function getCSSFiles()
    {
        $list = parent::getCSSFiles();

        $list[] = $this->getDir() . '/style.less';

        return $list;
    }
    
    protected function getInnerViewList()
    {
        return 'welcome-block.paypal';
    }

    /**
     * Return templates directory name
     *
     * @return string
     */
    protected function getDir()
    {
        return 'modules/CDev/Paypal/welcome_block/paypal';
    }

    /**
     * Check if widget is visible
     *
     * @return boolean
     */
    protected function isVisible()
    {
        return parent::isVisible()
            && $this->isRootAccess()
            && $this->isNotHiddenByUser()
            && !$this->isHiddenByConfig();
    }

    /**
     * @return bool
     */
    protected function isHiddenByConfig()
    {
        return !\XLite\Core\Config::getInstance()->CDev->Paypal->show_admin_welcome;
    }

    protected function getBlockName()
    {
        return 'paypal';
    }

    /**
     * Returns paupal email
     *
     * @return string
     */
    protected function getPaypalEmail()
    {
        $method = \XLite\Module\CDev\Paypal\Main::getPaymentMethod(\XLite\Module\CDev\Paypal\Main::PP_METHOD_EC);

        return $method->getSetting('email');
    }
}
