<?php

namespace Soy\Phinx;

trait PhinxConfigTrait
{
    /**
     * @var PhinxConfig
     */
    protected $config;

    /**
     * @return string
     */
    public function getBinary()
    {
        return $this->config->getBinary();
    }

    /**
     * @param string $binary
     * @return $this
     */
    public function setBinary($binary)
    {
        $this->config->setBinary($binary);
        return $this;
    }

    /**
     * @return string
     */
    public function getConfigurationFile()
    {
        return $this->config->getConfigurationFile();
    }

    /**
     * @param string $configurationFile
     * @return $this
     */
    public function setConfigurationFile($configurationFile)
    {
        $this->config->setConfigurationFile($configurationFile);
        return $this;
    }

    /**
     * @return $this
     */
    public function enableInteraction()
    {
        $this->config->enableInteraction();
        return $this;
    }

    /**
     * @return $this
     */
    public function disableInteraction()
    {
        $this->config->disableInteraction();
        return $this;
    }
}
