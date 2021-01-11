<?php

namespace Barion\common;

use ReflectionClass;

/**
 * Class Currency
 * @package Barion\common
 */
abstract class Currency
{
    const HUF = "HUF";
    const EUR = "EUR";
    const USD = "USD";
    const CZK = "CZK";

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