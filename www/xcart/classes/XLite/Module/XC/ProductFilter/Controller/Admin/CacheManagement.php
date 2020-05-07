<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\ProductFilter\Controller\Admin;

use XLite\Core\Database;
use XLite\Core\TopMessage;
use XLite\Model\Category;

class CacheManagement extends \XLite\Controller\Admin\CacheManagement implements \XLite\Base\IDecorator
{
    public function doActionRemoveProductFilterCache()
    {
        Database::getRepo(Category::class)->removeProductFilterCache();

        TopMessage::addInfo('The product filter cache has been removed successfully.');
    }
}
