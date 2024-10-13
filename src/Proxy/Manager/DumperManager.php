<?php

namespace YukataRm\Database\Proxy\Manager;

use YukataRm\Database\Dumper\Interface\MySQLDumperInterface;
use YukataRm\Database\Dumper\MySQLDumper;

/**
 * Dumper Proxy Manager
 * 
 * @package YukataRm\Database\Proxy\Manager
 */
class DumperManager
{
    /*----------------------------------------*
     * Make
     *----------------------------------------*/

    /**
     * make MySQL Dumper instance
     *
     * @return \YukataRm\Database\Dumper\Interface\MySQLDumperInterface
     */
    public function mysql(): MySQLDumperInterface
    {
        return new MySQLDumper();
    }
}
