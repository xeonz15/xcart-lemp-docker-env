<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\FacebookMarketing\Controller\Admin;

use XLite\Core\Request;
use XLite\Core\TopMessage;
use XLite\Core\Database;
use XLite\Core\EventTask;
use XLite\Module\XC\FacebookMarketing\Logic\ProductFeed\Generator as ProductFeedGenerator;

/**
 * FacebookMarketing
 */
class FacebookMarketing extends \XLite\Controller\Admin\AAdmin
{
    /**
     * Return the current page title (for the content area)
     *
     * @return string
     */
    public function getTitle()
    {
        return static::t('Facebook Ads & Instagram Ads');
    }

    /**
     * Preprocessor for no-action run
     *
     * @return void
     */
    protected function doNoAction()
    {
        $request = Request::getInstance();

        if ($request->product_feed_generation_completed) {
            TopMessage::addInfo('Product feed generation has been completed successfully');

            $this->setReturnURL(
                $this->buildURL('facebook_marketing')
            );

        } elseif ($request->product_feed_generation_failed) {
            TopMessage::addError('Product feed generation has been stopped');

            $this->setReturnURL(
                $this->buildURL('facebook_marketing')
            );
        }
    }

    /**
     * Check - generation process is not-finished or not
     *
     * @return boolean
     */
    public function isProductFeedGenerationNotFinished()
    {
        $eventName = ProductFeedGenerator::getEventName();
        $state = Database::getRepo('XLite\Model\TmpVar')->getEventState($eventName);

        return $state
               && in_array(
                   $state['state'],
                   [EventTask::STATE_STANDBY, EventTask::STATE_IN_PROGRESS]
               )
               && !Database::getRepo('XLite\Model\TmpVar')->getVar(ProductFeedGenerator::getCancelFlagVarName());
    }

    /**
     * Check - generation process is not-finished or not
     *
     * @return boolean
     */
    public function isProductFeedGenerationFinished()
    {
        return !$this->isProductFeedGenerationNotFinished();
    }

    /**
     * Check - generation process is not-finished or not
     *
     * @return boolean
     */
    public function isProductFeedGenerationAvailable()
    {
        return $this->isProductFeedGenerationFinished() && $this->getFeedProductCount() > 0;
    }

    /**
     * Count products for feed
     *
     * @return integer
     */
    public function getFeedProductCount()
    {
        return \XLite\Core\Database::getRepo('XLite\Model\Product')->countForFacebookProductFeed();
    }

    /**
     * Manually generate sitemap
     *
     * @return void
     */
    protected function doActionGenerate()
    {
        if ($this->isProductFeedGenerationAvailable()) {
            ProductFeedGenerator::run([]);
        } elseif (!$this->getFeedProductCount()) {
            \XLite\Core\TopMessage::addWarning('There is no products for facebook product feed generation');
        }

        $this->setReturnURL(
            $this->buildURL('facebook_marketing')
        );
    }

    /**
     * Cancel
     *
     * @return void
     */
    protected function doActionProductFeedGenerationCancel()
    {
        ProductFeedGenerator::cancel();
        TopMessage::addWarning('Product feed generation has been stopped');

        $this->setReturnURL(
            $this->buildURL('facebook_marketing')
        );
    }

    /**
     * Update Facebook Marketing settings
     */
    protected function doActionUpdateSettings()
    {
        if (isset(\XLite\Core\Request::getInstance()->pixel_id)) {
            $pixelId = \XLite\Core\Request::getInstance()->pixel_id;
            \XLite\Core\Database::getRepo('XLite\Model\Config')->createOption([
                'category' => 'XC\FacebookMarketing',
                'name'     => 'pixel_id',
                'value'    => $pixelId,
            ]);

            \XLite\Core\TopMessage::addInfo('Data have been saved successfully');
        }

        if (isset(\XLite\Core\Request::getInstance()->add_to_cart_value)) {
            $addToCartValue = \XLite\Core\Request::getInstance()->add_to_cart_value;
            \XLite\Core\Database::getRepo('XLite\Model\Config')->createOption([
                'category' => 'XC\FacebookMarketing',
                'name'     => 'add_to_cart_value',
                'value'    => $addToCartValue,
            ]);

            \XLite\Core\TopMessage::addInfo('Data have been saved successfully');
        }

        if (isset(\XLite\Core\Request::getInstance()->view_content_value)) {
            $viewContentValue = \XLite\Core\Request::getInstance()->view_content_value;
            \XLite\Core\Database::getRepo('XLite\Model\Config')->createOption([
                'category' => 'XC\FacebookMarketing',
                'name'     => 'view_content_value',
                'value'    => $viewContentValue,
            ]);

            \XLite\Core\TopMessage::addInfo('Data have been saved successfully');
        }

        if (isset(\XLite\Core\Request::getInstance()->init_checkout_value)) {
            $initCheckoutValue = \XLite\Core\Request::getInstance()->init_checkout_value;
            \XLite\Core\Database::getRepo('XLite\Model\Config')->createOption([
                'category' => 'XC\FacebookMarketing',
                'name'     => 'init_checkout_value',
                'value'    => $initCheckoutValue,
            ]);

            \XLite\Core\TopMessage::addInfo('Data have been saved successfully');
        }

        if (isset(\XLite\Core\Request::getInstance()->advanced_matching)) {
            $advancedMatching = \XLite\Core\Request::getInstance()->advanced_matching;
            \XLite\Core\Database::getRepo('XLite\Model\Config')->createOption([
                'category' => 'XC\FacebookMarketing',
                'name'     => 'advanced_matching',
                'value'    => $advancedMatching,
            ]);

            \XLite\Core\TopMessage::addInfo('Data have been saved successfully');
        }

        if (isset(\XLite\Core\Request::getInstance()->include_out_of_stock)) {
            $includeOutOfStock = \XLite\Core\Request::getInstance()->include_out_of_stock;
            \XLite\Core\Database::getRepo('XLite\Model\Config')->createOption([
                'category' => 'XC\FacebookMarketing',
                'name'     => 'include_out_of_stock',
                'value'    => $includeOutOfStock == 1 ? 'Y' : 'N',
            ]);

            \XLite\Core\TopMessage::addInfo('Data have been saved successfully');
        }

        if ($renewalFrequency = \XLite\Core\Request::getInstance()->renewal_frequency) {
            \XLite\Module\XC\FacebookMarketing\Core\Task\GenerateProductFeed::setRenewalPeriod($renewalFrequency);

            \XLite\Core\TopMessage::addInfo('Data have been saved successfully');
        }
    }
}