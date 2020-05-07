<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\View;

use Includes\Utils\Module\Manager;
use XLite\Core\Marketplace;
use XLite\Core\Cache\ExecuteCachedTrait;

/**
 * AdsBanners widget
 *
 * @ListChild (list="admin.h1.after", zone="admin")
 */
class AdsBanners extends \XLite\View\AView
{
    use ExecuteCachedTrait;

    /**
     * @return boolean
     */
    protected function isVisible()
    {
        return parent::isVisible() && $this->getAdsBanners();
    }

    /**
     * @return boolean
     */
    public function checkACL()
    {
        return parent::checkACL() && \XLite\Core\Auth::getInstance()->hasRootAccess();
    }

    /**
     * @return array
     */
    public function getJSFiles()
    {
        $result   = parent::getJSFiles();
        $result[] = 'ads_banners/controller.js';

        return $result;
    }

    /**
     * Check if widget is visible
     *
     * @return boolean
     */
    protected function getAdsBanners()
    {
        return $this->executeCachedRuntime(function () {
            return array_filter(
                Marketplace::getInstance()->getXC5Notifications(),
                [$this, 'isBannerForThisPage']
            );
        });
    }

    /**
     * Return true if banner should be shown in this page
     *
     * @param array $xc5Notification
     *
     * @return boolean
     */
    protected function isBannerForThisPage($xc5Notification)
    {
        $request        = \XLite\Core\Request::getInstance();
        $bannerHash     = $this->getBannerHash($xc5Notification);
        $isBannerClosed = $request->{$bannerHash} === 'closed';

        if ($xc5Notification['type'] === 'banner') {
            foreach ($xc5Notification['pageParams'] as $pageParamKey => $pageParamValue) {
                if ($pageParamValue && $pageParamValue !== $request->{$pageParamKey}) {
                    return false;
                }
            }

            if ($isBannerClosed
                || (($moduleName = $xc5Notification['module'])
                    && Manager::getRegistry()->isModuleEnabled($moduleName))
            ) {
                return false;
            }
        } else {
            return false;
        }

        return true;
    }

    /**
     * Return banner link
     *
     * @param array $banner
     *
     * @return string
     */
    protected function getBannerLink($banner)
    {
        return $this->executeCachedRuntime(function () use ($banner) {
            return $banner['module']
                ? Manager::getRegistry()->getModuleServiceURL($banner['module'])
                : $banner['link'];
        }, ['getBannerLink', $banner]);
    }

    /**
     * Return widget default template
     *
     * @return string
     */
    protected function getDefaultTemplate()
    {
        return 'ads_banners/body.twig';
    }

    /**
     * Return banner hash
     *
     * @param array $banner
     *
     * @return string
     */
    protected function getBannerHash($banner)
    {
        return md5(serialize($banner));
    }
}