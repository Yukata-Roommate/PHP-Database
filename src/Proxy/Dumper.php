<?php

namespace YukataRm\Database\Proxy;

use YukataRm\StaticProxy\StaticProxy;

use YukataRm\Database\Proxy\Manager\DumperManager as Manager;

/**
 * Dumper Proxy
 * 
 * @package YukataRm\Database\Proxy
 * 
 * @method static \YukataRm\Database\Dumper\Interface\MySQLDumperInterface mysql()
 * 
 * @see \YukataRm\Database\Proxy\Manager\DumperManager
 */
class Dumper extends StaticProxy
{
    /** 
     * get class name calling dynamic method
     * 
     * @return string 
     */
    protected static function getCallableClassName(): string
    {
        return Manager::class;
    }
}
