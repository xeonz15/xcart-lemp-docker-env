<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\CDev\Egoods\View\Model;

/**
 * Settings dialog model widget
 */
class Settings extends \XLite\View\Model\Settings implements \XLite\Base\IDecorator
{
    /**
     * Get form field by option
     *
     * @param \XLite\Model\Config $option Option
     *
     * @return array
     */
    protected function getFormFieldByOption(\XLite\Model\Config $option)
    {
        $cell = parent::getFormFieldByOption($option);

        switch ($option->getName()) {
            case 'amazon_access':
                $cell[static::SCHEMA_REQUIRED] = true;
                $cell[static::SCHEMA_DEPENDENCY] = [
                    static::DEPENDENCY_SHOW => [
                        'enable_signed_urls' => [true],
                    ],
                ];
                break;

            case 'amazon_secret':
                $cell[static::SCHEMA_REQUIRED] = true;
                $cell[static::SCHEMA_DEPENDENCY] = [
                    static::DEPENDENCY_SHOW => [
                        'enable_signed_urls' => [true],
                    ],
                ];
                break;

            case 'bucket':
                $cell[static::SCHEMA_REQUIRED] = true;
                $cell[static::SCHEMA_DEPENDENCY] = [
                    static::DEPENDENCY_SHOW => [
                        'enable_signed_urls' => [true],
                    ],
                ];
                break;

            case 'bucket_region':
                $cell[static::SCHEMA_DEPENDENCY] = [
                    static::DEPENDENCY_SHOW => [
                        'enable_signed_urls' => [true],
                    ],
                ];
                break;
        }

        return $cell;
    }
}
