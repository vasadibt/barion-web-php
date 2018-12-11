<?php
/**
 * Created by PhpStorm.
 * User: Tamás
 * Date: 2018. 12. 11.
 * Time: 11:54
 */

namespace Barion\common;

/**
 * Class CardType
 * @package Barion\library
 */
abstract class CardType
{
    const Unknown = "Unknown";
    const Mastercard = "Mastercard";
    const Maestro = "Maestro";
    const Visa = "Visa";
    const Electron = "Electron";
    const AmericanExpress = "AmericanExpress";
}