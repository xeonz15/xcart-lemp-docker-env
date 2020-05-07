<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XCart\ConfigParser;

class ConfigFile
{
    /**
     * @var string
     */
    private $file;

    /**
     * @var array
     */
    private $data;

    /**
     * @param string $file
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * @return array
     * @throws ConfigMissingFileException
     * @throws ConfigWrongFormattedFileException
     */
    public function getData()
    {
        if ($this->data === null) {
            $this->loadFromFile();
        }

        return $this->data;
    }

    /**
     * @throws ConfigMissingFileException
     * @throws ConfigWrongFormattedFileException
     */
    private function loadFromFile()
    {
        if (!$this->isReadable()) {
            throw ConfigMissingFileException::fromMissingFile($this->file);
        }

        $data = parse_ini_file($this->file, true);

        if (!is_array($data)) {
            throw ConfigWrongFormattedFileException::fromWrongFormattedFile($this->file);
        }

        $this->data = $data;
    }

    /**
     * @return bool
     */
    private function isReadable()
    {
        return (is_file($this->file) || is_link($this->file)) && is_readable($this->file);
    }
}
