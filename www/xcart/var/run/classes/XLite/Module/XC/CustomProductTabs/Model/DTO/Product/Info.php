<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\CustomProductTabs\Model\DTO\Product;


 class Info extends \XLite\Module\XC\CustomerAttachments\Model\DTO\Product\Info implements \XLite\Base\IDecorator
{
    /**
     * @inheritdoc
     */
    public function afterCreate($object, $rawData = null)
    {
        parent::afterCreate($object, $rawData);

        \XLite\Core\Database::getRepo('XLite\Model\Product\GlobalTab')->createGlobalTabsAliases($object);
    }
}