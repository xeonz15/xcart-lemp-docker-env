<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\XC\YandexCheckout;

abstract class Main extends \XLite\Module\AModule
{
    /**
     * @return array
     */
    public static function getYMPaymentSubjectOptions()
    {
        return [
            'commodity'             => (string) \XLite\Core\Translation::lbl('ym_subj_commodity'),
            'excise'                => (string) \XLite\Core\Translation::lbl('ym_subj_excise'),
            'job'                   => (string) \XLite\Core\Translation::lbl('ym_subj_job'),
            'service'               => (string) \XLite\Core\Translation::lbl('ym_subj_service'),
            'gambling_bet'          => (string) \XLite\Core\Translation::lbl('ym_subj_gambling_bet'),
            'gambling_prize'        => (string) \XLite\Core\Translation::lbl('ym_subj_gambling_prize'),
            'lottery'               => (string) \XLite\Core\Translation::lbl('ym_subj_lottery'),
            'lottery_prize'         => (string) \XLite\Core\Translation::lbl('ym_subj_lottery_prize'),
            'intellectual_activity' => (string) \XLite\Core\Translation::lbl('ym_subj_intellectual_activity'),
            'payment'               => (string) \XLite\Core\Translation::lbl('ym_subj_payment'),
            'agent_commission'      => (string) \XLite\Core\Translation::lbl('ym_subj_agent_commission'),
            'composite'             => (string) \XLite\Core\Translation::lbl('ym_subj_composite'),
            'another'               => (string) \XLite\Core\Translation::lbl('ym_subj_another'),
        ];
    }
}
