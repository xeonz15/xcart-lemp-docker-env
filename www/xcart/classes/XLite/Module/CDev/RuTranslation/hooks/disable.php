<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

return new \XLite\Rebuild\Hook(
    function () {
        $language = \XLite\Core\Database::getRepo('XLite\Model\Language')->findOneByCode('ru');
        if ($language !== null) {
            $language->setEnabled(false);
            $language->setAdded(false);

            \XLite\Core\Database::getRepo('XLite\Model\Language')->update($language);
            \XLite\Core\Translation::getInstance()->reset();
        }
    }
);
