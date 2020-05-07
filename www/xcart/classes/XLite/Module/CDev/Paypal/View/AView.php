<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\CDev\Paypal\View;

/**
 * Abstarct widget
 */
abstract class AView extends \XLite\View\AView implements \XLite\Base\IDecorator
{
    /**
     * Get CSS files
     *
     * @return array
     */
    public function getCSSFiles()
    {
        $list = parent::getCSSFiles();

        if (!\XLite::isAdminZone()) {
            $list[] = 'modules/CDev/Paypal/style.css';
            $list[] = [
                'file'  => 'modules/CDev/Paypal/style.less',
                'media' => 'screen',
                'merge' => 'bootstrap/css/bootstrap.less',
            ];
        }

        return $list;
    }
}
