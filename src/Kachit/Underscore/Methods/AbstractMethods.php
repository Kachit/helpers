<?php
/**
 * Abstract methods class
 * 
 * @author antoxa <kornilov@realweb.ru>
 * @package Kachit\Underscore\Methods
 */
namespace Kachit\Underscore\Methods;

abstract class AbstractMethods {

    /**
     * @param $value
     * @return bool
     */
    public static function _isEmpty($value) {
        return empty($value);
    }
}