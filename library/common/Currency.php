<?php
/**
 * Created by PhpStorm.
 * User: Tamás
 * Date: 2018. 12. 11.
 * Time: 11:54
 */

namespace Barion\common;

use ReflectionClass;

/**
 * Class Currency
 * @package Barion\library
 */
abstract class Currency
{
    const HUF = "HUF";
    const EUR = "EUR";
    const USD = "USD";

    /**
     * @param string $name
     * @return bool
     * @throws \ReflectionException
     */
    public static function isValid($name)
    {
        $class = new ReflectionClass(__CLASS__);
        $constants = $class->getConstants();
        return array_key_exists($name, $constants);
    }
}