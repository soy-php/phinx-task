<?php

namespace Soy\Phinx;

class Config
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
     * @var bool
     */
    protected $interactionEnabled = false;

    /**
     * @return string
     */
    public function getDefaultArguments()
    {
        return ($this->getConfigurationFile() !== null ? '-c ' . $this->getConfigurationFile() . ' ' : '')
            . (!$this->isInteractionEnabled() ? '-n ' : '');
    }

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

    /**
     * @return $this
     */
    public function enableInteraction()
    {
        $this->interactionEnabled = false;
        return $this;
    }

    /**
     * @return $this
     */
    public function disableInteraction()
    {
        $this->interactionEnabled = false;
        return $this;
    }

    /**
     * @return bool
     */
    public function isInteractionEnabled()
    {
        return $this->interactionEnabled;
    }
}
