<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\Robokassa\View\FormField\Select;

/**
 * Taxation system
 */
class TaxationSystem extends \XLite\View\FormField\Select\Regular
{
    /**
     * @return array
     */
    protected function getDefaultOptions()
    {
        return [
            'osn'                => static::t('General taxation system'),
            'usn_income'         => static::t('Simplified taxation system (income)'),
            'usn_income_outcome' => static::t('Simplified taxation system (income minus costs)'),
            'envd'               => static::t('A single tax on imputed income'),
            'esn'                => static::t('Unified agricultural tax'),
            'patent'             => static::t('Patent taxation system'),
        ];
    }
}
