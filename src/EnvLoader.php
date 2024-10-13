<?php

namespace YukataRm\Database;

use YukataRm\EnvLoader\BaseEnvLoader;

/**
 * EnvLoader
 * 
 * @package YukataRm\Database
 * 
 * @property-read string $mysqlDumpDriver
 * @property-read string $pgsqlDumpDriver
 */
class EnvLoader extends BaseEnvLoader
{
    /**
     * key name prefix
     * 
     * @var string
     */
    const KEY_PREFIX = self::KEY_PREFIX_DEFAULT . "DATABASE_";

    /******************************************
     * MySQL
     *****************************************/

    /**
     * mysql key name prefix
     * 
     * @var string
     */
    const MYSQL_KEY_PREFIX = self::KEY_PREFIX . "MYSQL_";

    /*----------------------------------------*
     * Dump Driver
     *---------------------------------------*/

    /**
     * mysql dump driver
     * 
     * @var string|null
     */
    protected string|null $_mysqlDumpDriver;

    /**
     * mysql dump driver key name
     * 
     * @var string
     */
    const MYSQL_DUMP_DRIVER_KEY = self::MYSQL_KEY_PREFIX . "DUMP_DRIVER";

    /**
     * get mysql dump driver
     * 
     * @return string
     */
    public function mysqlDumpDriver(): string
    {
        return isset($this->_mysqlDumpDriver) ? $this->_mysqlDumpDriver : "mysqldump";
    }

    /******************************************
     * PostgreSQL
     *****************************************/

    /**
     * pgsql key name prefix
     * 
     * @var string
     */
    const PGSQL_KEY_PREFIX = self::KEY_PREFIX . "PGSQL_";

    /*----------------------------------------*
     * Dump Driver
     *---------------------------------------*/

    /**
     * pgsql dump driver
     * 
     * @var string|null
     */
    protected string|null $_pgsqlDumpDriver;

    /**
     * pgsql dump driver key name
     * 
     * @var string
     */
    const PGSQL_DUMP_DRIVER_KEY = self::PGSQL_KEY_PREFIX . "DUMP_DRIVER";

    /**
     * get pgsql dump driver
     * 
     * @return string
     */
    public function pgsqlDumpDriver(): string
    {
        return isset($this->_pgsqlDumpDriver) ? $this->_pgsqlDumpDriver : "pg_dump";
    }

    /**
     * bind .env parameters
     * 
     * @return void
     */
    protected function bind(): void
    {
        $this->_mysqlDumpDriver = $this->nullableString(self::MYSQL_DUMP_DRIVER_KEY);
        $this->_pgsqlDumpDriver = $this->nullableString(self::PGSQL_DUMP_DRIVER_KEY);
    }
}
