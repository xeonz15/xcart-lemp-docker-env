<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\Concierge\Controller\Admin;

use XLite\Module\XC\Concierge\Core\Mediator;
use XLite\Module\XC\Concierge\Core\Track\Track;
/**
 */
abstract class ActivateFreeLicense extends \XLite\Controller\Admin\ActivateFreeLicense implements \XLite\Base\IDecorator
{
    /**
     * We send the free license activation key
     *
     * @return void
     */
    protected function doActivateFreeLicense()
    {
        Mediator::getInstance()->addMessage(new Track('Activate Free License'));

        parent::doActivateFreeLicense();
    }
}
