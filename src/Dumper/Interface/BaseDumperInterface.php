<?php

namespace YukataRm\Database\Dumper\Interface;

/**
 * Base Dumper Interface
 * 
 * @package YukataRm\Database\Dumper\Interface
 */
interface BaseDumperInterface
{
    /*----------------------------------------*
     * Dump Database
     *----------------------------------------*/

    /**
     * get driver name
     * 
     * @return string
     */
    public function driver(): string;

    /**
     * dump database
     * 
     * @return bool
     */
    public function dump(): bool;

    /*----------------------------------------*
     * Dump Command
     *----------------------------------------*/

    /**
     * get dump command
     * 
     * @return array<string>
     */
    public function command(): array;

    /**
     * get dump command string
     * 
     * @return string
     */
    public function commandString(): string;

    /**
     * add dump command
     * 
     * @param string $command
     * @return static
     */
    public function addCommand(string $command): static;
}
