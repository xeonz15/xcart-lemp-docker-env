<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\CDev\Sale\Module\CDev\Wholesale\Logic;

use XLite\Core\Database;

/**
 * MoneyModificator: price with sale discount
 *
 * @Decorator\Depend ("CDev\Wholesale")
 */
class MoneyModificator extends \XLite\Module\CDev\Sale\Logic\MoneyModificator implements \XLite\Base\IDecorator
{
    /**
     * Check modificator - apply or not
     *
     * @param \XLite\Model\AEntity $model     Model
     * @param string               $property  Model's property
     * @param array                $behaviors Behaviors
     * @param string               $purpose   Purpose
     *
     * @return boolean
     */
    static public function isApply(\XLite\Model\AEntity $model, $property, array $behaviors, $purpose)
    {
        return static::getObject($model) instanceOf \XLite\Model\Product
            && static::getObject($model)->getParticipateSale()
            && ((static::getObject($model)->getApplySaleToWholesale()
                    && static::getObject($model)->getDiscountType() === static::getObject($model)::SALE_DISCOUNT_TYPE_PERCENT
                ) || !static::getObject($model)->getWholesalePrices() || static::getObject($model)->isFirstWholesaleTier());
    }
}
