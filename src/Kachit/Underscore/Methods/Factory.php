<?php
/**
 * Factory
 *
 * @author Kachit
 * @package Kachit\Underscore\Methods
 */
namespace Kachit\Underscore\Methods;

class Factory {

    protected static $namespace = 'Kachit\Underscore\Methods';

    /**
     * @param $method
     * @return string
     */
    public static function getMethodsClassName($method) {
        return self::$namespace . '\\' . ucfirst($method);
    }
}