<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\ProductFilter\View\FormField\Inline\Input\Checkbox\Switcher;

/**
 * Filter switcher
 *
 */
class Filter extends \XLite\View\FormField\Inline\Input\Checkbox\Switcher\Enabled
{
    /**
     * Define form field
     *
     * @return string
     */
    protected function defineFieldClass()
    {
        return 'XLite\Module\XC\ProductFilter\View\FormField\Input\Checkbox\Switcher\Filter';
    }

    /**
     * Get initial field parameters
     *
     * @param array $field Field data
     *
     * @return array
     */
    protected function getFieldParams(array $field)
    {
        $params = parent::getFieldParams($field);

        if (
            $this->getEntity() instanceof \XLite\Model\Attribute
            && \XLite\Model\Attribute::TYPE_HIDDEN === $this->getEntity()->getType()
        ) {
            $params[\XLite\Module\XC\ProductFilter\View\FormField\Input\Checkbox\Switcher\Filter::PARAM_EDITABLE] = false;
        }

        return $params;
    }
}