<?php

namespace Soy\Phinx;

use League\CLImate\CLImate;
use Soy\Task\CliTask;

class PhinxCreateTask extends CliTask
{
    use PhinxConfigTrait;

    /**
     * @var string
     */
    protected $name;

    /**
     * @param CLImate $climate
     * @param PhinxConfig $config
     */
    public function __construct(CLImate $climate, PhinxConfig $config)
    {
        parent::__construct($climate);
        $this->config = $config;
    }

    /**
     * @return string
     */
    public function getCommand()
    {
        $command = $this->getBinary() . ' create ' . $this->getName() . ' ' . $this->config->getDefaultArguments();

        if (count($this->getArguments()) > 0) {
            $command .= ' ' . implode($this->getArguments());
        }

        return $command;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
