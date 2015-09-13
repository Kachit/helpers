<?php
/**
 * Numbers static methods class
 *
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Underscore\Methods;

use Kachit\Underscore\Numbers;

class NumberMethods extends AbstractMethods {

    /**
     * @param $value
     * @return bool
     */
    public static function isNumber($value) {
        return self::isDouble($value) || self::isFloat($value) || self::isInt($value);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isValid($value) {
        return self::isNumber($value);
    }

    /**
     * @param $value
     * @param int $precision
     * @param int $mode
     * @return float
     */
    public static function round($value, $precision = 0, $mode = PHP_ROUND_HALF_UP) {
        return round($value, $precision, $mode);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isInt($value) {
        return is_int($value);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isFloat($value) {
        return is_float($value);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isDouble($value) {
        return is_double($value);
    }
}