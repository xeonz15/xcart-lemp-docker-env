<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\CDev\RuTranslation\View;

/**
 * Tax banner page
 *
 */
 class TaxBanner extends \XLite\View\TaxBannerAbstract implements \XLite\Base\IDecorator
{
    /**
     * Define list of help links
     *
     * @return array
     */
    protected function defineHelpLinks()
    {
        $links = parent::defineHelpLinks();

        if (\XLite\Module\CDev\RuTranslation\Main::isActiveLanguage()) {
            $links = array(
                        array(
                            'title' => static::t('Setting up tax classes'),
                            'url'   => '//kb.x-cart.ru/taxes/setting_up_tax_classes.html'
                        )
                    );
        }

        return $links;
    }
    
}