<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\CDev\Wholesale\View\ItemsList;

/**
 * Wholesale prices items list (product variant)
 *
 * @Decorator\Depend("XC\ProductVariants")
 */
class ProductVariantWholesalePrices extends \XLite\Module\CDev\Wholesale\View\ItemsList\WholesalePrices implements \XLite\Base\IDecorator
{
    /**
     * Define repository name
     *
     * @return string
     */
    protected function defineRepositoryName()
    {
        return 'product_variant' == $this->getTarget()
            ? 'XLite\Module\CDev\Wholesale\Model\ProductVariantWholesalePrice'
            : parent::defineRepositoryName();
    }

    /**
     * createEntity
     *
     * @return \XLite\Module\XC\ProductVariants\Model\ProductVariant
     */
    protected function createEntity()
    {
        $entity = parent::createEntity();
        if ('product_variant' == $this->getTarget()) {
            $entity->setProductVariant($this->getProductVariant());
        }

        return $entity;
    }

    // {{{ Data

    /**
     * Return wholesale prices
     *
     * @param \XLite\Core\CommonCell $cnd       Search condition
     * @param boolean                $countOnly Return items list or only its size OPTIONAL
     *
     * @return array|integer
     */
    protected function getData(\XLite\Core\CommonCell $cnd, $countOnly = false)
    {
        if ('product_variant' == $this->getTarget()) {
            $cnd->{\XLite\Module\CDev\Wholesale\Model\Repo\ProductVariantWholesalePrice::P_PRODUCT_VARIANT} = $this->getProductVariant();
            $cnd->{\XLite\Module\CDev\Wholesale\Model\Repo\ProductVariantWholesalePrice::P_ORDER_BY_MEMBERSHIP} = true;
            $cnd->{\XLite\Module\CDev\Wholesale\Model\Repo\ProductVariantWholesalePrice::P_ORDER_BY} = ['w.quantityRangeBegin', 'ASC'];

            $result = \XLite\Core\Database::getRepo('XLite\Module\CDev\Wholesale\Model\ProductVariantWholesalePrice')
                ->search($cnd, $countOnly);

        } else {
            $result = parent::getData($cnd, $countOnly);
        }

        return $result;
    }

    /**
     * Return default price
     *
     * @return mixed
     */
    protected function getDefaultPriceValue()
    {
        $result = parent::getDefaultPriceValue();
        if ('product_variant' == $this->getTarget()) {
            $result = $this->getProductVariant()->getClearPrice();
        }

        return $result;
    }

    // }}}

    /**
     * Get URL common parameters
     *
     * @return array
     */
    protected function getCommonParams()
    {
        $this->commonParams = parent::getCommonParams();
        $this->commonParams['id'] = \XLite\Core\Request::getInstance()->id;

        return $this->commonParams;
    }

    /**
     * Get tier by quantity and membership
     *
     * @param \XLite\Module\CDev\Wholesale\Model\Base\AWholesalePrice $entity
     *
     * @return \XLite\Module\CDev\Wholesale\Model\Base\AWholesalePrice
     */
    protected function getTierByWholesaleEntity($entity)
    {
        if ('product_variant' == $this->getTarget()) {
            return $entity->getRepository()->findOneBy([
                'quantityRangeBegin' => $entity->getQuantityRangeBegin(),
                'membership'         => $entity->getMembership(),
                'productVariant'     => $this->getProductVariant(),
            ]);
        }

        return parent::getTierByWholesaleEntity($entity);
    }
}
