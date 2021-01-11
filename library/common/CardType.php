<?php

namespace Barion\common;

/**
 * Class CardType
 * @package Barion\common
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