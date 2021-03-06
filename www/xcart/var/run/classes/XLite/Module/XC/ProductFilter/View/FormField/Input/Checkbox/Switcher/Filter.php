<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\ProductFilter\View\FormField\Input\Checkbox\Switcher;

/**
 * Filter switcher
 *
 */
class Filter extends \XLite\View\FormField\Input\Checkbox\Switcher
{
    const PARAM_EDITABLE = 'editable';

    /**
     * Get a list of CSS files required to display the widget properly
     *
     * @return array
     */
    public function getCSSFiles()
    {
        $list = parent::getCSSFiles();
        $list[] = 'modules/XC/ProductFilter/form_field/checkbox/switcher/filter.css';

        return $list;
    }

    /**
     * Return field template
     *
     * @return string
     */
    protected function getFieldTemplate()
    {
        return '../modules/XC/ProductFilter/form_field/checkbox/switcher/filter.twig';
    }

    /**
     * Define the specific CSS class for according the switcher type
     *
     * @return string
     */
    protected function getTypeSwitcherClass()
    {
        return 'switcher-filter';
    }

    /**
     * Determines if checkbox is checked
     *
     * @return boolean
     */
    protected function isChecked()
    {
        return parent::isChecked() && $this->isEditable();
    }

    /**
     * Define widget params
     *
     * @return void
     */
    protected function defineWidgetParams()
    {
        parent::defineWidgetParams();

        $this->widgetParams += array(
            self::PARAM_EDITABLE => new \XLite\Model\WidgetParam\TypeBool('Editable flag', true),
        );
    }

    /**
     * Check if field is editable
     *
     * @return bool
     */
    protected function isEditable()
    {
        return $this->getParam(static::PARAM_EDITABLE);
    }
}