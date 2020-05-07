<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\ProductFilter\Module\XC\BulkEditing\Logic\BulkEdit;

/**
 * Bulk edit generator
 *
 * @Decorator\Depend ("XC\BulkEditing")
 */
 class Generator extends \XLite\Module\XC\BulkEditing\Logic\BulkEdit\GeneratorAbstract implements \XLite\Base\IDecorator
{
    /**
     * Finalize
     */
    public function finalize()
    {
        parent::finalize();

        \XLite\Core\Database::getRepo('XLite\Model\Category')->removeProductFilterCache();
    }
}
