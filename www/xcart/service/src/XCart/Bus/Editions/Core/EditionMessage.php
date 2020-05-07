<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XCart\Bus\Editions\Core;

use XCart\SilexAnnotations\Annotations\Service;

/**
 * @Service\Service()
 */
class EditionMessage
{
    /**
     * @var array
     */
    private $ultimateModules;

    /**
     * @var EditionStorage
     */
    private $editionStorage;

    /**
     * @param EditionStorage $editionStorage
     */
    public function __construct(
        EditionStorage $editionStorage
    ) {
        $this->editionStorage = $editionStorage;
    }

    /**
     * @param string $moduleName
     *
     * @return string
     */
    public function getEditionMessage($moduleName): string
    {
        $message       = '';
        $activeEdition = $this->editionStorage->getActiveEditionName();

        if (in_array($activeEdition, ['default', 'multivendor'], true)) {
            $ultimatePaidModules = $this->getUltimatePaidModules();

            if (in_array($moduleName, $ultimatePaidModules, true)) {
                $message = 'module_state_message.trial.paid';
            }
        }

        if ('default' === $activeEdition) {
            $multiVendorFreeModules = $this->getMultiVendorFreeModules();

            if (in_array($moduleName, $multiVendorFreeModules, true)) {
                $message = 'module_state_message.trial.multivendor';
            }
        }

        return $message;
    }

    /**
     * @return array
     */
    private function getUltimatePaidModules(): array
    {
        if ($this->ultimateModules === null) {
            $edition = $this->editionStorage->getIsolatedEdition('ultimate');

            $this->ultimateModules = array_keys($edition);
        }

        return $this->ultimateModules;
    }

    /**
     * @return array
     */
    private function getMultiVendorFreeModules(): array
    {
        return [
            'XC-MultiVendor',
            'XC-TrustedVendors',
        ];
    }
}
