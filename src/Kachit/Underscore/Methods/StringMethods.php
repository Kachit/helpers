<?php
/**
 * Strings static methods class
 *
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Underscore\Methods;

class StringMethods extends AbstractMethods {

    /**
     * Convert string to camelCase
     *
     * @param string $string
     * @param bool $lcFirst
     * @return string
     */
    public static function toCamelCase($string, $lcFirst = true) {
        $string = str_replace(' ', '', ucwords(strtolower(preg_replace('/[-_]/', ' ', $string))));
        return ($lcFirst) ? lcfirst($string) : $string;
    }

    /**
     * Convert string to snake_case
     *
     * @param string $string
     * @return string
     */
    public static function toSnakeCase($string) {
        $string = trim($string);
        $string = preg_replace('/[^a-zA-Z0-9\-\_\s]/', '', $string);
        $string = preg_replace('/[\_\s\-]+/', '_', $string);
        $string = preg_replace('/([a-z])([A-Z])/', '\\1_\\2', $string);
        $string = strtolower($string);
        return $string;
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isString($value) {
        return is_string($value);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isValid($value) {
        return self::isString($value);
    }

    public static function limit($string, $limit) {

    }

    public static function find($string, $pattern) {

    }

    public static function validate($string, $filter) {
        return filter_var($string, $filter) !== false;
    }

    /**
     * @param $search
     * @param $replace
     * @param $subject
     * @param null $count
     * @return mixed
     */
    public static function replace($search, $replace, $subject, $count = null) {
        return str_replace($search, $replace, $subject, $count);
    }

    /**
     * @param $string
     * @param $delimiter
     * @return array
     */
    public static function explode($string, $delimiter) {
        return explode($delimiter, $string);
    }

    /**
     * Check if a string is an IP.
     *
     * @param string $string
     * @return bool
     */
    public static function isIp($string) {
        return self::validate($string, FILTER_VALIDATE_IP);
    }

    /**
     * Check if a string is an email.
     *
     * @param string $string
     * @return bool
     */
    public static function isEmail($string) {
        return self::validate($string, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Check if a string is an url.
     *
     * @param string $string
     * @return bool
     */
    public static function isUrl($string) {
        return self::validate($string, FILTER_VALIDATE_URL);
    }

    /**
     * Limit words
     *
     * @param string $string
     * @param int $limitWords
     * @return string
     */
    public static function words($string, $limitWords) {
        $textArray = explode(' ', $string);
        $count = count($textArray);
        if ($count > $limitWords) {
            $result = array_slice($textArray, 0, $limitWords);
            $string = implode(' ', $result);
        }
        return $string;
    }
}