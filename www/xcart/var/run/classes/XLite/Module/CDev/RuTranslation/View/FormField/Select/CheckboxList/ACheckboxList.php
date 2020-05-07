<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\CDev\RuTranslation\View\FormField\Select\CheckboxList;

/**
 * Multiple select based on checkboxes list
 */
abstract class ACheckboxList extends \XLite\View\FormField\Select\CheckboxList\ACheckboxListAbstract implements \XLite\Base\IDecorator
{
    /**
     * Get selected list threshold
     *
     * @return  integer
     */
    protected function getSelectedListThreshold()
    {
        return \XLite\Module\CDev\RuTranslation\Main::isActiveLanguage()
            ? 1
            : parent::getSelectedListThreshold();
    }
}
