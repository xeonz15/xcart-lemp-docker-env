<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Logic\Import\Processor\AttributeValues;

use XLite\Model\AttributeValue;

/**
 * Products import processor
 */
abstract class AAttributeValue extends \XLite\Logic\Import\Processor\AProcessor
{
    /**
     * Attribute type
     *
     * @var string
     */
    protected $attributeType = null;

    /**
     * Product classes cache
     *
     * @var array
     */
    protected $classesCache = [];

    /**
     * Attribute groups cache
     *
     * @var array
     */
    protected $groupsCache = [];

    /**
     * Attributes cache
     *
     * @var array
     */
    protected $attributesCache = [];

    /**
     * Products cache
     *
     * @var array
     */
    protected $productsCache = [];

    /**
     * Products cache
     *
     * @var array
     */
    protected $attrsCache = [];


    /**
     * Get title
     *
     * @return string
     */
    static public function getTitle()
    {
        return static::t('Product attributes values has been imported');
    }

    /**
     * Get import file name format
     *
     * @return string
     */
    public function getFileNameFormat()
    {
        return 'product-attributes.csv';
    }

    // {{{ Columns

    /**
     * Define columns
     *
     * @return array
     */
    protected function defineColumns()
    {
        return [
            'productSKU'        => [
                static::COLUMN_IS_KEY => true,
            ],
            'type'              => [
                static::COLUMN_IS_KEY => true,
            ],
            'name'              => [
                static::COLUMN_IS_KEY => true,
                static::COLUMN_LENGTH => 255,
            ],
            'class'             => [
                static::COLUMN_IS_KEY => true,
                static::COLUMN_LENGTH => 255,
            ],
            'group'             => [
                static::COLUMN_IS_KEY => true,
                static::COLUMN_LENGTH => 255,
            ],
            'owner'             => [
                static::COLUMN_IS_KEY => true,
            ],
            'value'             => [
                static::COLUMN_IS_KEY => true,
            ],
            'default'           => [],
            'priceModifier'     => [],
            'weightModifier'    => [],
            'editable'          => [],
            'attributePosition' => [],
            'valuePosition'     => [],
            'displayMode'       => [],
        ];
    }

    // }}}

    /**
     * Get messages
     *
     * @return array
     */
    public static function getMessages()
    {
        return parent::getMessages()
            + [
                'ATTRS-PRODUCT-SKU-FMT'     => 'ProductSKU is empty',
                'ATTRS-PRODUCT-NOT-EXISTS'  => 'Product with SKU "{{value}}" does not exists',
                'ATTRS-TYPE-FMT'            => 'Wrong "type" value ({{value}}). This should be "C", "S", "H" or "T"',
                'ATTRS-NAME-FMT'            => 'Name is empty',
                'ATTRS-OWNER-FMT'           => 'Wrong "owner" format ({{value}}). Value should be one of "Yes" or "No"',
                'ATTRS-DEFAULT-FMT'         => 'Wrong "default" format ({{value}}). Value should be one of "Yes" or "No"',
                'ATTRS-PRICE-MODIFIER-FMT'  => 'Wrong "priceModifier" format ({{value}}). Correct examples: +1, +1%, -1, -1%',
                'ATTRS-WEIGHT-MODIFIER-FMT' => 'Wrong "weightModifier" format ({{value}}). Correct examples: +1, +1%, -1, -1%',
                'ATTRS-CLASS-WRN'           => 'Product class {{value}} does not exists and will be created',
                'ATTRS-GROUP-WRN'           => 'Group {{value}} does not exists and will be created',
                'ATTRS-EDITABLE-FMT'        => 'Wrong "owner" format ({{value}}). Value should be one of "Yes" or "No" or empty',
                'ATTR-MODE-S-FMT'           => 'Wrong display mode format for selector',
                'ATTR-MODE-NOT-S-FMT'       => 'Wrong display mode format for not selector',
            ];
    }

    /**
     * Returns csv format manual URL
     *
     * @return string
     */
    public static function getCSVFormatManualURL()
    {
        return static::t('https://kb.x-cart.com/import-export/csv_format_by_x-cart_data_type/csv_import_product_attribute_values.html');
    }

    /**
     * Check - specified file is imported by this processor or not
     *
     * @param \SplFileInfo $file File
     *
     * @return boolean
     */
    protected function isImportedFile(\SplFileInfo $file)
    {
        return 0 === strpos($file->getFilename(), 'product-attributes');
    }

    /**
     * Correct columns data (leave only data for the specific attribute type)
     *
     * @param array $rows Data row(s)
     *
     * @return array
     */
    protected function assembleColumnsData(array $rows)
    {
        $typeRaw = $this->getColumn('type');
        $typeProcessed = $this->processColumn('type', $typeRaw);
        $type = $this->assembleColumnData($typeProcessed, $rows);

        return !$type || $this->attributeType != $type
            ? []
            : parent::assembleColumnsData($rows);
    }

    /**
     * Check if product will be added
     */
    protected function isProductWillBeAdded($sku){
        $products = \XLite\Core\Session::getInstance()->importedProductSkus;

        return null !== $products
            ? in_array($sku, $products)
            : false;
    }

    /**
     * Verify 'productSKU' value
     *
     * @param mixed $value  Value
     * @param array $column Column info
     *
     * @return void
     */
    protected function verifyProductSKU($value, array $column)
    {
        if ($this->verifyValueAsEmpty($value)) {
            $this->addError('ATTRS-PRODUCT-SKU-FMT', ['column' => $column, 'value' => $value]);

        } elseif (!$this->isUpdateMode()) {
            $product = \XLite\Core\Database::getRepo('XLite\Model\Product')->findOneBy(['sku' => $value]);

            if (!$product && !$this->isProductWillBeAdded($value)) {
                $this->addError('ATTRS-PRODUCT-NOT-EXISTS', ['column' => $column, 'value' => $value]);
            }
        }
    }

    /**
     * Verify 'type' value
     *
     * @param mixed $value  Value
     * @param array $column Column info
     *
     * @return void
     */
    protected function verifyType($value, array $column)
    {
        if (!$this->verifyValueAsSet($value, ['C', 'S', 'T', 'H'])) {
            $this->addError('ATTRS-TYPE-FMT', ['column' => $column, 'value' => $value]);
        }
    }

    /**
     * Verify 'name' value
     *
     * @param mixed $value  Value
     * @param array $column Column info
     *
     * @return void
     */
    protected function verifyName($value, array $column)
    {
        if ($this->verifyValueAsEmpty($value)) {
            $this->addError('ATTRS-NAME-FMT', ['column' => $column, 'value' => $value]);
        }
    }

    /**
     * Verify 'owner' value
     *
     * @param mixed $value  Value
     * @param array $column Column info
     *
     * @return void
     */
    protected function verifyOwner($value, array $column)
    {
        if (!$this->verifyValueAsBoolean($value)) {
            $this->addError('ATTRS-OWNER-FMT', ['column' => $column, 'value' => $value]);
        }
    }

    /**
     * Verify 'default' value
     *
     * @param mixed $value  Value
     * @param array $column Column info
     *
     * @return void
     */
    protected function verifyDefault($value, array $column)
    {
        if (!$this->verifyValueAsBoolean($value)) {
            $this->addError('ATTRS-DEFAULT-FMT', ['column' => $column, 'value' => $value]);
        }
    }

    /**
     * Verify 'priceModifier' value
     *
     * @param mixed $value  Value
     * @param array $column Column info
     *
     * @return void
     */
    protected function verifyPriceModifier($value, array $column)
    {
        if (!$this->verifyValueAsEmpty($value) && !$this->checkModifierFormat($value)) {
            $this->addError('ATTRS-PRICE-MODIFIER-FMT', ['column' => $column, 'value' => $value]);
        }
    }

    /**
     * Verify 'weightModifier' value
     *
     * @param mixed $value  Value
     * @param array $column Column info
     *
     * @return void
     */
    protected function verifyWeightModifier($value, array $column)
    {
        if (!$this->verifyValueAsEmpty($value) && !$this->checkModifierFormat($value)) {
            $this->addError('ATTRS-WEIGHT-MODIFIER-FMT', ['column' => $column, 'value' => $value]);
        }
    }

    protected function checkModifierFormat($value)
    {
        return true;
    }

    /**
     * Verify 'class' value
     *
     * @param mixed $value  Value
     * @param array $column Column info
     *
     * @return void
     */
    protected function verifyClass($value, array $column)
    {
        if (!$this->verifyValueAsEmpty($value)) {

            $entity = \XLite\Core\Database::getRepo('XLite\Model\ProductClass')->findOneByName($value);

            if (!$entity) {
                $this->addWarning('ATTRS-CLASS-WRN', ['column' => $column, 'value' => $value]);
            }
        }
    }

    /**
     * Verify 'Group' value
     *
     * @param mixed $value  Value
     * @param array $column Column info
     *
     * @return void
     */
    protected function verifyGroup($value, array $column)
    {
        if (!$this->verifyValueAsEmpty($value)) {

            $entity = \XLite\Core\Database::getRepo('XLite\Model\AttributeGroup')->findOneByName($value);

            if (!$entity) {
                $this->addWarning('ATTRS-GROUP-WRN', ['column' => $column, 'value' => $value]);
            }
        }
    }

    /**
     * Verify 'editable' value
     *
     * @param mixed $value  Value
     * @param array $column Column info
     *
     * @return void
     */
    protected function verifyEditable($value, array $column)
    {
        if (!$this->verifyValueAsEmpty($value) && !$this->verifyValueAsBoolean($value)) {
            $this->addError('ATTRS-EDITABLE-FMT', ['column' => $column, 'value' => $value]);
        }
    }

    /**
     * Verify 'displayMode' value
     *
     * @param mixed $value  Value
     * @param array $column Column info
     *
     * @return void
     */
    protected function verifyDisplayMode($value, array $column)
    {
        if ($this->isDisplayModeVerified($this->currentRowData)) {
            return;
        }

        if ($this->currentRowData['type'] === \XLite\Model\Attribute::TYPE_SELECT) {
            $availableDisplayModes = \XLite\Model\Attribute::getDisplayModes();
            if (!isset($availableDisplayModes[$value])) {
                $this->addError('ATTR-MODE-S-FMT', ['column' => $column, 'value' => $value]);
            }
        } elseif (!$this->verifyValueAsEmpty($value)) {
            $this->addError('ATTR-MODE-NOT-S-FMT', ['column' => $column, 'value' => $value]);
        }

        $this->setDisplayModeVerified($this->currentRowData);
    }

    /**
     * @param array $rowData
     *
     * @return bool
     */
    protected function isDisplayModeVerified(array $rowData)
    {
        $options = $this->importer->getOptions();

        $key = $this->getDisplayModeVerifiedKey($rowData);

        return isset($options[$key]) && $options[$key] === true;
    }

    /**
     * @param array $rowData
     */
    protected function setDisplayModeVerified(array $rowData)
    {
        $options = $this->importer->getOptions();

        $key = $this->getDisplayModeVerifiedKey($rowData);

        $options[$key] = true;
        $this->importer->setOptions($options);
    }

    /**
     * @param array $rowData
     *
     * @return string
     */
    protected function getDisplayModeVerifiedKey(array $rowData)
    {
        return implode('.', [
            'displayModeVerify',
            $rowData['productSKU'],
            $rowData['type'],
            $rowData['name'],
            $rowData['class'],
            $rowData['group'],
            $rowData['owner'],
        ]);
    }

    /**
     * Normalize 'owner' value
     *
     * @param mixed @value Value
     *
     * @return boolean
     */
    protected function normalizeOwnerValue($value)
    {
        return $this->normalizeValueAsBoolean($value);
    }

    /**
     * Import 'sku' value
     *
     * @param \XLite\Model\AttributeValue\AAttributeValue $model Attribute value object
     * @param mixed                                       $value  Value
     * @param array                                       $column Column info
     *
     * @return void
     */
    protected function importProductSkuColumn($model, $value, array $column)
    {
    }

    /**
     * Import 'class' value
     *
     * @param \XLite\Model\AttributeValue\AAttributeValue $model Attribute value object
     * @param mixed                                       $value  Value
     * @param array                                       $column Column info
     *
     * @return void
     */
    protected function importClassColumn($model, $value, array $column)
    {
    }

    /**
     * Import 'group' value
     *
     * @param \XLite\Model\AttributeValue\AAttributeValue $model Attribute value object
     * @param mixed                                       $value  Value
     * @param array                                       $column Column info
     *
     * @return void
     */
    protected function importGroupColumn($model, $value, array $column)
    {
        $product = $model->getProduct();

        $productClass = $model->getAttribute()->getProductClass();

        if ($productClass) {
            $product->setProductClass($productClass);
        }
    }

    /**
     * Import 'owner' value
     *
     * @param \XLite\Model\AttributeValue\AAttributeValue $model Attribute value object
     * @param mixed                                       $value  Value
     * @param array                                       $column Column info
     *
     * @return void
     */
    protected function importOwnerColumn($model, $value, array $column)
    {
    }

    /**
     * Import 'default' value
     *
     * @param \XLite\Model\AttributeValue\AAttributeValue $model Attribute value object
     * @param mixed                                       $value  Value
     * @param array                                       $column Column info
     *
     * @return void
     */
    protected function importDefaultColumn($model, $value, array $column)
    {
        if ($model->isPropertyExists('defaultValue')) {
            $model->setDefaultValue($this->normalizeValueAsBoolean($value));
        }
    }

    /**
     * Import 'type' value
     *
     * @param \XLite\Model\AttributeValue\AAttributeValue $model Attribute value object
     * @param mixed                                       $value  Value
     * @param array                                       $column Column info
     *
     * @return void
     */
    protected function importTypeColumn($model, $value, array $column)
    {
    }


    /**
     * Import 'name' value
     *
     * @param \XLite\Model\AttributeValue\AAttributeValue $model Attribute value object
     * @param mixed                                       $value  Value
     * @param array                                       $column Column info
     *
     * @return void
     */
    protected function importNameColumn($model, $value, array $column)
    {
    }

    /**
     * Import 'editable' value
     *
     * @param \XLite\Model\AttributeValue\AAttributeValue $model Attribute value object
     * @param mixed                                       $value  Value
     * @param array                                       $column Column info
     *
     * @return void
     */
    protected function importEditableColumn($model, $value, array $column)
    {
        if (\XLite\Model\Attribute::TYPE_TEXT == $model->getAttribute()->getType()) {
            $model->setEditable($this->normalizeValueAsBoolean($value));
        }
    }

    /**
     * Detect model
     *
     * @param array $data Data
     *
     * @return \XLite\Model\AEntity
     */
    /*
    protected function detectModel(array $data)
    {
        $this->getRepository()->findOneByImportConditions($conditions) : null;
    }
     */


    /**
     * Get cached product class by its name
     *
     * @param string $name Product class name
     *
     * @return \XLite\Model\ProductClass Product class object
     */
    protected function getProductClass($name, $create = false)
    {
        if (!isset($this->classesCache[$name])) {
            $this->classesCache[$name] = \XLite\Core\Database::getRepo('XLite\Model\ProductClass')->findOneByName($name);
        }

        if ($create && !empty($name) && !$this->classesCache[$name]) {
            $entity = new \XLite\Model\ProductClass;
            $entity->setName($name);
            $productClass = \XLite\Core\Database::getRepo('XLite\Model\ProductClass')->insert($entity);

            \XLite\Core\Database::getEM()->persist($productClass);

            $this->classesCache[$name] = $productClass;
        }

        return $this->classesCache[$name];
    }

    /**
     * Get cached attribute group by its name
     *
     * @param string $name Attribute group name
     * @param \XLite\Model\ProductClass $productClass Product class object
     *
     * @return \XLite\Model\AttributeGroup Attribute group object
     */
    protected function getAttributeGroup($name, $productClass = null, $create = false)
    {
        $cacheKey = $name . ($productClass ? $productClass->getId() : '');

        if (!isset($this->groupsCache[$cacheKey])) {
            $this->groupsCache[$cacheKey] = \XLite\Core\Database::getRepo('XLite\Model\AttributeGroup')->findOneByNameAndProductClass($name, $productClass);
        }

        if ($create && !empty($name) && $productClass && !$this->groupsCache[$cacheKey]) {
            $entity = new \XLite\Model\AttributeGroup;
            $entity->setName($name);
            $entity->setProductClass($productClass);
            $group = \XLite\Core\Database::getRepo('XLite\Model\AttributeGroup')->insert($entity);

            \XLite\Core\Database::getEM()->persist($group);

            $this->groupsCache[$cacheKey] = $group;
        }

        return $this->groupsCache[$cacheKey];
    }

    /**
     * Get cached attribute by import row data
     *
     * @param array $data Import row data
     *
     * @return \XLite\Model\Attribute Attribute object
     */
    protected function getAttribute($data)
    {
        $keyData = [
            'p:' . $data['productSKU'],
            't:' . $data['type'],
            'c:' . $data['class'],
            'g:' . $data['group'],
            'o:' . $data['owner'],
            'n:' . $data['name'],
        ];

        $key = implode(';', $keyData);

        if (empty($this->attrsCache[$key])) {
            $cnd = new \XLite\Core\CommonCell();

            if ($data['owner']) {
                $cnd->product        = $this->getProduct($data['productSKU']);
                $cnd->productClass   = null;
                $cnd->attributeGroup = null;

            } else {
                $cnd->product        = null;
                $cnd->productClass   = $this->getProductClass($data['class']);
                $cnd->attributeGroup = $this->getAttributeGroup($data['group'], $this->getProductClass($data['class']));
            }

            $cnd->name = $data['name'];
            $cnd->type = $data['type'];

            $attribute = \XLite\Core\Database::getRepo('XLite\Model\Attribute')->search($cnd);

            if ($attribute) {
                $attribute = $attribute[0];

            } else {
                $attribute = null;
            }

            $this->attrsCache[$key] = $attribute;
        }

        return $this->attrsCache[$key];
    }

    /**
     * Get cached attribute group by its name
     *
     * @param string $name Attribute group name
     *
     * @return \XLite\Model\AttributeGroup Attribute group object
     */
    protected function getProduct($sku)
    {
        if (!isset($this->productsCache[$sku])) {
            $this->productsCache[$sku] = \XLite\Core\Database::getRepo('XLite\Model\Product')->findOneBy(['sku' => $sku]);
        }

        return $this->productsCache[$sku];
    }

    /**
     * Create model
     *
     * @param array $data Data
     *
     * @return \XLite\Model\AttributeValue\AAttributeValue
     */
    protected function createModel(array $data)
    {
        $data['owner'] = $this->normalizeValueAsBoolean($data['owner']);

        $product = $this->getProduct($data['productSKU']);

        $attribute = $this->getAttribute($data);

        if (!$attribute) {
            $attribute = $this->createAttribute($data);
        }

        $model = $this->getRepository()->insert($this->getAttributeValueData($data, $attribute));

        $model->setAttribute($attribute);
        $model->setProduct($product);

        return $model;
    }

    /**
     * Get attribute value data
     *
     * @param array                  $data      Import row data
     * @param \XLite\Model\Attribute $attribute Attribute object
     *
     * @return array
     */
    protected function getAttributeValueData($data, $attribute)
    {
        return [
            'value' => $data['value'],
        ];
    }

    /**
     * Create attribute object
     *
     * @param array $data Import row data
     *
     * @return \XLite\Model\Attribute
     */
    protected function createAttribute($data)
    {
        return \XLite\Core\Database::getRepo('\XLite\Model\Attribute')->insert($this->getAttributeData($data));
    }

    /**
     * Get attribute data from import row data to create attribute object
     *
     * @param array $data Import row data
     *
     * @return array 
     */
    protected function getAttributeData($data)
    {
        if ($data['owner']) {
            $product        = $this->getProduct($data['productSKU']);
            $productClass   = null;
            $attributeGroup = null;

        } else {
            $product        = null;
            $productClass   = $this->getProductClass($data['class'], true);
            $attributeGroup = $this->getAttributeGroup($data['group'], $productClass, true);
        }

        return [
            'name'           => $data['name'],
            'productClass'   => $productClass,
            'attributeGroup' => $attributeGroup,
            'product'        => $product,
            'type'           => $data['type'],
        ];
    }


    /**
     * Import 'attributePosition' value
     *
     * @param \XLite\Model\AttributeValue\AttributeValueSelect $model  Attribute value object
     * @param mixed                                            $value  Value
     * @param array                                            $column Column info
     *
     * @return void
     */
    protected function importAttributePositionColumn($model, $value, array $column)
    {
        if ($value && !$this->isAttributePositionImported($model)) {
            $model->getAttribute()->setPosition([
                'product'  => $model->getProduct(),
                'position' => $value
            ]);
            $this->setAttributePositionImported($model);
        }
    }

    /**
     * Import 'displayMode' value
     *
     * @param \XLite\Model\AttributeValue\AttributeValueSelect $model  Attribute value object
     * @param mixed                                            $value  Value
     * @param array                                            $column Column info
     *
     * @return void
     */
    protected function importDisplayModeColumn($model, $value, array $column)
    {
        if ($value && !$this->isDisplayModeImported($model)) {
            $model->getAttribute()
                ->getProperty($model->getProduct())
                ->setDisplayMode($value);

            $this->setDisplayModeImported($model);
        }
    }

    /**
     * Import 'valuePosition' value
     *
     * @param \XLite\Model\AttributeValue\AttributeValueSelect $model  Attribute value object
     * @param mixed                                            $value  Value
     * @param array                                            $column Column info
     *
     * @return void
     */
    protected function importValuePositionColumn($model, $value, array $column)
    {
    }

    /**
     * @param AttributeValue\AAttributeValue $attributeValue
     *
     * @return bool
     */
    protected function isAttributePositionImported(AttributeValue\AAttributeValue $attributeValue)
    {
        $options = $this->importer->getOptions();

        $key = $this->getAttributePositionImportedKey($attributeValue);

        return isset($options[$key]) && $options[$key] === true;
    }

    /**
     * @param AttributeValue\AAttributeValue $attributeValue
     */
    protected function setAttributePositionImported(AttributeValue\AAttributeValue $attributeValue)
    {
        $options = $this->importer->getOptions();

        $key = $this->getAttributePositionImportedKey($attributeValue);

        $options[$key] = true;
        $this->importer->setOptions($options);
    }

    /**
     * @param AttributeValue\AAttributeValue $attributeValue
     *
     * @return string
     */
    protected function getAttributePositionImportedKey(AttributeValue\AAttributeValue $attributeValue)
    {
        return implode('.', [
            'position',
            $attributeValue->getProduct()
                ? $attributeValue->getProduct()->getProductId()
                : 'none',
            $attributeValue->getAttribute()
                ? $attributeValue->getAttribute()->getId()
                : 'none',
        ]);
    }

    /**
     * @param AttributeValue\AAttributeValue $attributeValue
     *
     * @return bool
     */
    protected function isDisplayModeImported(AttributeValue\AAttributeValue $attributeValue)
    {
        $options = $this->importer->getOptions();

        $key = $this->getDisplayModeImportedKey($attributeValue);

        return isset($options[$key]) && $options[$key] === true;
    }

    /**
     * @param AttributeValue\AAttributeValue $attributeValue
     */
    protected function setDisplayModeImported(AttributeValue\AAttributeValue $attributeValue)
    {
        $options = $this->importer->getOptions();

        $key = $this->getDisplayModeImportedKey($attributeValue);

        $options[$key] = true;
        $this->importer->setOptions($options);
    }

    /**
     * @param AttributeValue\AAttributeValue $attributeValue
     *
     * @return string
     */
    protected function getDisplayModeImportedKey(AttributeValue\AAttributeValue $attributeValue)
    {
        return implode('.', [
            'displayModeImport',
            $attributeValue->getProduct()
                ? $attributeValue->getProduct()->getProductId()
                : 'none',
            $attributeValue->getAttribute()
                ? $attributeValue->getAttribute()->getId()
                : 'none',
        ]);
    }
}
