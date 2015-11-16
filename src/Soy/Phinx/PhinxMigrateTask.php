<?php

namespace Soy\Phinx;

use League\CLImate\CLImate;
use Soy\Task\CliTask;

class PhinxMigrateTask extends CliTask
{
    use PhinxConfigTrait;

    const TYPE_TARGET = '-t';
    const TYPE_DATE = '-d';

    /**
     * @var string
     */
    protected $environment;

    /**
     * @var string
     */
    protected $target;

    /**
     * @var string
     */
    protected $type = self::TYPE_TARGET;

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
     * @param string|null $target
     * @param string|null $type
     */
    public function run($target = null, $type = null)
    {
        if ($target !== null) {
            $oldTarget = $this->getTarget();
            $this->setTarget($target);
        }

        if ($type !== null) {
            $oldType = $this->getType();
            $this->setType($type);
        }

        parent::run();

        if ($target !== null) {
            $this->setTarget($oldTarget);
        }

        if ($type !== null) {
            $this->setType($oldType);
        }
    }

    /**
     * @return string
     */
    public function getCommand()
    {
        $command = $this->getBinary() . ' migrate '
            . ($this->getEnvironment() !== null ? '-e ' . $this->getEnvironment() . ' ' : '')
            . ($this->getTarget() !== null ? $this->getType() . ' ' . $this->getTarget() . ' ' : '')
            . $this->config->getDefaultArguments();

        if (count($this->getArguments()) > 0) {
            $command .= ' ' . implode($this->getArguments());
        }

        return $command;
    }

    /**
     * @return string
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param string $environment
     * @return $this
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
        return $this;
    }

    /**
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @param string $target
     * @return $this
     */
    public function setTarget($target)
    {
        $this->target = $target;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        if (!in_array($type, [self::TYPE_DATE, self::TYPE_TARGET])) {
            throw new \LogicException(
                'Unknown type, available types: PhinxMigrateTask::TYPE_DATE, PhinxMigrateTask::TYPE_TARGET'
            );
        }

        $this->type = $type;
        return $this;
    }
}
