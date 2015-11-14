<?php

namespace Soy\Phinx;

class PhinxConfig
{
    /**
     * @var string
     */
    protected $binary = './vendor/bin/phinx';

    /**
     * @var string
     */
    protected $configurationFile;

    /**
     * @return string
     */
    public function getBinary()
    {
        return $this->binary;
    }

    /**
     * @param string $binary
     * @return $this
     */
    public function setBinary($binary)
    {
        $this->binary = $binary;
        return $this;
    }

    /**
     * @return string
     */
    public function getConfigurationFile()
    {
        return $this->configurationFile;
    }

    /**
     * @param string $configurationFile
     * @return $this
     */
    public function setConfigurationFile($configurationFile)
    {
        $this->configurationFile = $configurationFile;
        return $this;
    }
}
