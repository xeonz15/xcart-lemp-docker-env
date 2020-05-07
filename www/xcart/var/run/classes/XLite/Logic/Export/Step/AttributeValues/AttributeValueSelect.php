<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Logic\Export\Step\AttributeValues;

/**
 * Products attribute values: select
 */
class AttributeValueSelect extends \XLite\Logic\Export\Step\AttributeValues\AAttributeValues
{
    /**
     * Get repository
     *
     * @return \XLite\Model\Repo\ARepo
     */
    protected function getRepository()
    {
        return \XLite\Core\Database::getRepo('XLite\Model\AttributeValue\AttributeValueSelect');
    }

    /**
     * Get column value for 'sku' column
     *
     * @param array   $dataset Dataset
     * @param string  $name    Column name
     * @param integer $i       Subcolumn index
     *
     * @return string
     */
    protected function getValuePositionColumnValue(array $dataset, $name, $i)
    {
        return $dataset['model']->getPosition();
    }

    /**
     * Get column value for 'displayMode' column
     *
     * @param array   $dataset Dataset
     * @param string  $name    Column name
     * @param integer $i       Subcolumn index
     *
     * @return string
     */
    protected function getDisplayModeColumnValue(array $dataset, $name, $i)
    {
        $result = '';

        if (!$this->isDisplayModeExported($dataset['model'])) {
            $result = $dataset['model']->getAttribute()->getDisplayMode(
                $dataset['model']->getProduct()
            );
            $this->setDisplayModeExported($dataset['model']);
        }

        return $result;
    }

    /**
     * @param \XLite\Model\AttributeValue\AttributeValueSelect $attributeValue
     *
     * @return bool
     */
    protected function isDisplayModeExported(\XLite\Model\AttributeValue\AttributeValueSelect $attributeValue)
    {
        $options = $this->generator->getOptions();

        $key = $this->getDisplayModeExportedKey($attributeValue);

        return isset($options[$key]) && $options[$key] === true;
    }

    /**
     * @param \XLite\Model\AttributeValue\AttributeValueSelect $attributeValue
     */
    protected function setDisplayModeExported(\XLite\Model\AttributeValue\AttributeValueSelect $attributeValue)
    {
        $options = $this->generator->getOptions();

        $key = $this->getDisplayModeExportedKey($attributeValue);

        $options[$key] = true;
        $this->generator->setOptions($options);
    }

    /**
     * @param \XLite\Model\AttributeValue\AttributeValueSelect $attributeValue
     *
     * @return string
     */
    protected function getDisplayModeExportedKey(\XLite\Model\AttributeValue\AttributeValueSelect $attributeValue)
    {
        return implode('.', [
            'displayMode',
            $attributeValue->getProduct()
                ? $attributeValue->getProduct()->getProductId()
                : 'none',
            $attributeValue->getAttribute()
                ? $attributeValue->getAttribute()->getId()
                : 'none',
        ]);
    }
}
