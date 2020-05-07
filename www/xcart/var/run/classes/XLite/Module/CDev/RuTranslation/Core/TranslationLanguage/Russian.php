<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\CDev\RuTranslation\Core\TranslationLanguage;

/**
 * English
 */
class Russian extends \XLite\Core\TranslationLanguage\ATranslationLanguage
{
    // {{{ Label translators

    /**
     * Translate label 'X modules will be upgraded'
     *
     * @param array $arguments Arguments
     *
     * @return string
     */
    public function translateLabelXModulesWillBeUpgraded(array $arguments)
    {
        $label = $this->getLabelByRule(
            [
                'X module will be upgraded',
                'X modules will be upgraded',
                'X modules will be upgraded (5)',
            ],
            $arguments['count'],
            \XLite\Module\CDev\RuTranslation\Main::LANG_CODE
        );

        return \XLite\Core\Translation::getInstance()->translateByString($label, $arguments);
    }

    /**
     * Translate label 'X modules will be disabled'
     *
     * @param array $arguments Arguments
     *
     * @return string
     */
    public function translateLabelXModulesWillBeDisabled(array $arguments)
    {
        $label = $this->getLabelByRule(
            [
                'X module will be disabled',
                'X modules will be disabled',
                'X modules will be disabled (5)',
            ],
            $arguments['count'],
            \XLite\Module\CDev\RuTranslation\Main::LANG_CODE
        );

        return \XLite\Core\Translation::getInstance()->translateByString($label, $arguments);
    }

    /**
     * Translate label 'X-Cart Business trial will expire in X days'
     *
     * @param array $arguments Arguments
     *
     * @return string
     */
    public function translateLabelTrialWillExpireInXDays(array $arguments)
    {
        $label = $this->getLabelByRule(
            [
                'X-Cart Business trial will expire in X day',
                'X-Cart Business trial will expire in X days',
                'X-Cart Business trial will expire in X days (5)',
            ],
            $arguments['count'],
            \XLite\Module\CDev\RuTranslation\Main::LANG_CODE
        );

        return \XLite\Core\Translation::getInstance()->translateByString($label, $arguments);
    }

    /**
     * Translate label 'X-Cart Business trial will expire in X days'
     *
     * @param array $arguments Arguments
     *
     * @return string
     */
    public function translateLabelAccessToBusinessFeaturesExpiresInXDays(array $arguments)
    {
        $label = $this->getLabelByRule(
            [
                'Your access to X-Cart Business features expires in X day',
                'Your access to X-Cart Business features expires in X days',
                'Your access to X-Cart Business features expires in X days (5)',
            ],
            $arguments['count'],
            \XLite\Module\CDev\RuTranslation\Main::LANG_CODE
        );

        return \XLite\Core\Translation::getInstance()->translateByString($label, $arguments);
    }


    /**
     * Translate label 'X days left'
     *
     * @param array $arguments Arguments
     *
     * @return string
     */
    public function translateLabelXDaysLeft(array $arguments)
    {
        $label = $this->getLabelByRule(
            [
                'X day left',
                'X days left',
                'X days left (5)',
            ],
            $arguments['count'],
            \XLite\Module\CDev\RuTranslation\Main::LANG_CODE
        );

        return \XLite\Core\Translation::getInstance()->translateByString($label, $arguments);
    }

    /**
     * Translate label 'X addons'
     *
     * @param array $arguments Arguments
     *
     * @return string
     */
    public function translateLabelXAddons(array $arguments)
    {
        $label = $this->getLabelByRule(
            [
                'X addon',
                'X addons',
                'X addons (5)',
            ],
            $arguments['count'],
            \XLite\Module\CDev\RuTranslation\Main::LANG_CODE
        );

        return \XLite\Core\Translation::getInstance()->translateByString($label, $arguments);
    }

    /**
     * Translate label 'new core and X addons'
     *
     * @param array $arguments Arguments
     *
     * @return string
     */
    public function translateLabelNewCoreAndXAddons(array $arguments)
    {
        $label = $this->getLabelByRule(
            [
                'new core and X addon',
                'new core and X addons',
                'new core and X addons (5)',
            ],
            $arguments['count'],
            \XLite\Module\CDev\RuTranslation\Main::LANG_CODE
        );

        return \XLite\Core\Translation::getInstance()->translateByString($label, $arguments);
    }

    /**
     * Translate label 'X items'
     *
     * @param array $arguments Arguments
     *
     * @return string
     */
    public function translateLabelXOrders(array $arguments)
    {
        $label = $this->getLabelByRule(
            [
                'X order',
                'X orders',
                'X orders (5)',
            ],
            $arguments['count'],
            \XLite\Module\CDev\RuTranslation\Main::LANG_CODE
        );

        return \XLite\Core\Translation::getInstance()->translateByString($label, $arguments);
    }


    /**
     * Translate label '{{count}} days'
     *
     * @param array $arguments Arguments
     *
     * @return string
     */
    public function translateLabelXDays(array $arguments)
    {
        $label = $this->getLabelByRule(
            [
                '{{count}} day',
                '{{count}} days',
                '{{count}} days (5)',
            ],
            $arguments['count'],
            \XLite\Module\CDev\RuTranslation\Main::LANG_CODE
        );

        return \XLite\Core\Translation::getInstance()->translateByString($label, $arguments);
    }

    // }}}
}
