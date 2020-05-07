<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\View;

/**
 * Packaging supplies page view
 */
class PackagingSupplies extends \XLite\View\AView
{
    /**
     * Return list of allowed targets
     *
     * @return array
     */
    public static function getAllowedTargets()
    {
        return array_merge(parent::getAllowedTargets(), array('packaging_supplies'));
    }

    /**
     * Return widget default template
     *
     * @return string
     */
    protected function getDefaultTemplate()
    {
        return 'packaging_supplies/body.twig';
    }

    /**
     * Register CSS files
     *
     * @return array
     */
    public function getCSSFiles()
    {
        $list = parent::getCSSFiles();

        $list[] = 'packaging_supplies/style.less';

        return $list;
    }

    protected function getButtonUrl() {
        $url = "https://supplies.x-cart.com";
        $params = [
            'utm_source'    => 'XC5admin',
            'utm_medium'    => 'xcart_supplies_btn_click',
            'utm_campaign'  => 'XC5admin'
        ];
        
        return \XLite\Core\URLManager::appendParamsToUrl($url, $params);
    }
}
