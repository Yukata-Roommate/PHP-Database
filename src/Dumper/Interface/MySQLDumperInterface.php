<?php

namespace YukataRm\Database\Dumper\Interface;

use YukataRm\Database\Dumper\Interface\BaseDumperInterface;

/**
 * MySQL Dumper Interface
 * 
 * @package YukataRm\Database\Dumper\Interface
 */
interface MySQLDumperInterface extends BaseDumperInterface
{
    /*----------------------------------------*
     * Database
     *----------------------------------------*/

    /**
     * get all databases
     * 
     * @return bool
     */
    public function allDatabases(): bool;

    /**
     * set all databases
     * 
     * @return static
     */
    public function setAllDatabases(): static;

    /**
     * get database name
     * 
     * @return array<string>
     */
    public function database(): array;

    /**
     * set database name
     * 
     * @param string|array<string> $database
     * @return static
     */
    public function setDatabase(string|array $database): static;

    /**
     * get table names
     * 
     * @return array<string>
     */
    public function tables(): array;

    /**
     * set table names
     * 
     * @param array<string> $tables
     * @return static
     */
    public function setTables(array $tables): static;

    /*----------------------------------------*
     * Option
     *----------------------------------------*/

    /**
     * get options
     * 
     * @return array<string>
     */
    public function options(): array;

    /**
     * get option string
     * 
     * @return string
     */
    public function optionString(): string;

    /**
     * set options
     * 
     * @param array<string> $options
     * @return static
     */
    public function setOptions(array $options): static;

    /**
     * add option
     * 
     * @param string $name
     * @param string|null $value
     * @return static
     */
    public function addOption(string $name, string|null $value = null): static;

    /**
     * call add option
     * 
     * @param string $name
     * @param array<string> $arguments
     * @return static
     */
    public function __call(string $name, array $arguments): static;
}
