<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XCart\Bus\Query\Data\Filter\Module;

use Iterator;
use XCart\Bus\Domain\Module;
use XCart\Bus\Query\Data\ModulesDataSource;
use XCart\SilexAnnotations\Annotations\Service;
use XCart\Bus\Core\Annotations\DataSourceFilter;
use XCart\Bus\Query\Data\Filter\AFilterGenerator;

/**
 * @DataSourceFilter(name="existsUpdate")
 * @Service\Service()
 */
class ExistsUpdateGenerator extends AFilterGenerator
{
    /**
     * @var ModulesDataSource
     */
    protected $modulesDataSource;

    /**
     * @var array
     */
    private $typeModules = [];

    /**
     * FlattenGenerator constructor.
     *
     * @param ModulesDataSource $modulesDataSource
     */
    public function __construct(ModulesDataSource $modulesDataSource)
    {
        $this->modulesDataSource = $modulesDataSource;
    }

    /**
     * @param $type
     * @return Module[]
     */
    protected function getFlattenModules($type)
    {
        if (isset($this->typeModules[$type])) {
            return $this->typeModules[$type];
        }

        $filters = ['installed' => true];

        /** @var Module[] $modules */
        $this->typeModules[$type] = array_filter(
            $this->modulesDataSource->getSlice($type, $filters),
            static function ($item) use ($type) {
                /** @var Module $item */
                return ($type === 'self'
                        ? $item->id === 'XC-Service'
                        : $item->id !== 'XC-Service'
                    )
                    && $item->version !== null;
            }
        );

        return $this->typeModules[$type];
    }

    /**
     * @param Iterator $iterator
     * @param string $field
     * @param mixed $data
     * @return ExistsUpdate
     */
    public function __invoke(Iterator $iterator, $field, $data)
    {
        $modules = $this->getFlattenModules($data);

        return new ExistsUpdate($iterator, $field, $data, $modules);
    }
}