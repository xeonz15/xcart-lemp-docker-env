<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\CDev\RuTranslation\Core;

/**
 * Translation core rutine
 */
class Translation extends \XLite\Core\Translation implements \XLite\Base\IDecorator
{
    /**
     * Define translation languages
     *
     * @return array
     */
    protected function defineTranslationLanguages()
    {
        $list = parent::defineTranslationLanguages();
        $list['ru'] = '\\XLite\\Module\\CDev\\RuTranslation\\Core\\TranslationLanguage\\Russian';

        return $list;
    }
}
