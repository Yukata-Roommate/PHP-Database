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
     * @return bool
     */
    public function dump(): bool
    {
        $this->setCommand();

        return $this->executeCommand();
    }

    /**
     * add driver name
     * 
     * @return void
     */
    protected function addDriverName(): void
    {
        $this->addCommand($this->driver());
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
     * @return bool
     */
    protected function executeCommand(): bool
    {
        $command = $this->commandString();

        $command = $this->prepareExecuteCommand($command);

        $output = exec($command);

        $output = $this->passesExecuteCommand($output);

        return $output !== null;
    }

    /**
     * prepare execute command
     * 
     * @param string $command
     * @return string
     */
    protected function prepareExecuteCommand(string $command): string
    {
        return $command;
    }

    /**
     * passes execute command
     * 
     * @param string $output
     * @return string
     */
    protected function passesExecuteCommand(string $output): string
    {
        return $output;
    }

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
