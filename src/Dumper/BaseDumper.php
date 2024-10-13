<?php

namespace YukataRm\Database\Dumper;

use YukataRm\Database\Dumper\Interface\BaseDumperInterface;

use YukataRm\Database\EnvLoader;

/**
 * Base Dumper
 * 
 * @package YukataRm\Database\Dumper
 */
abstract class BaseDumper implements BaseDumperInterface
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * EnvLoader instance
     * 
     * @var \YukataRm\Database\EnvLoader
     */
    protected EnvLoader $env;

    /**
     * constructor
     */
    public function __construct()
    {
        $this->env = new EnvLoader();
    }

    /*----------------------------------------*
     * Dump Database
     *----------------------------------------*/

    /**
     * get driver name
     * 
     * @return string
     */
    abstract public function driver(): string;

    /**
     * dump database
     * 
     * @return void
     */
    public function dump(): void
    {
        $this->setCommand();

        $this->executeCommand();
    }

    /**
     * set dump command
     * 
     * @return void
     */
    abstract protected function setCommand(): void;

    /**
     * execute dump command
     * 
     * @return void
     */
    abstract protected function executeCommand(): void;

    /*----------------------------------------*
     * Dump Command
     *----------------------------------------*/

    /**
     * dump commands
     * 
     * @var array<string>
     */
    protected array $commands = [];

    /**
     * get dump command
     * 
     * @return array<string>
     */
    public function command(): array
    {
        return $this->commands;
    }

    /**
     * get dump command string
     * 
     * @return string
     */
    public function commandString(): string
    {
        return implode(" ", $this->commands);
    }

    /**
     * add dump command
     * 
     * @param string $command
     * @return static
     */
    public function addCommand(string $command): static
    {
        $this->commands[] = $command;

        return $this;
    }

    /*----------------------------------------*
     * Dump File
     *----------------------------------------*/

    /**
     * dump file path
     * 
     * @var string
     */
    protected string $dumpFile;

    /**
     * get dump file path
     * 
     * @return string
     */
    public function dumpFile(): string
    {
        return $this->dumpFile;
    }

    /**
     * set dump file path
     * 
     * @param string $dumpFile
     * @return static
     */
    public function setDumpFile(string $dumpFile): static
    {
        $this->dumpFile = $dumpFile;

        return $this;
    }

    /**
     * add dump file path
     * 
     * @return void
     */
    abstract protected function addDumpFile(): void;
}
