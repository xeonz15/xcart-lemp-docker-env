<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\QSL\CloudSearch\Controller;

use XLite\Module\QSL\CloudSearch\Core\IndexingEvent\IndexingEventProfiler;
use XLite\Module\QSL\CloudSearch\Core\RegistrationScheduler;
use XLite\Module\QSL\CloudSearch\Main;

/**
 * Abstract controller
 */
abstract class AController extends \XLite\Module\XC\MailChimp\Controller\AController implements \XLite\Base\IDecorator
{
    /**
     * Handles the request.
     * Parses the request variables if necessary. Attempts to call the specified action function
     *
     * @return void
     */
    public function handleRequest()
    {
        if (\XLite::isAdminZone() || !Main::isConfigured()) {
            RegistrationScheduler::getInstance()->registerIfScheduled();
        }

        parent::handleRequest();
    }

    public function __destruct()
    {
        IndexingEventProfiler::getInstance()->log();
    }
}
