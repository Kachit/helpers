<?php
/**
 * Array helper
 *
 * @author Kachit
 * @package Kachit\Helper
 */
namespace Kachit\Helper;

class ArrayHelper
{
    /**
     * @param $array
     * @param $valueParam
     * @param bool $keyParam
     * @return array
     */
    public function arrayColumn(array $array, $valueParam, $keyParam = false) {
        if (PHP_VERSION_ID >= 50400) {
            return array_column($array, $valueParam, $keyParam);
        }
        $data = array();
        if(!empty($array)) {
            foreach($array as $key => $value) {
                if(empty($keyParam)) {
                    $data[$key] = $value[$valueParam];
                } else {
                    $data[$value[$keyParam]] = $value[$valueParam];
                }
            }
        }
        return $data;
    }

    /**
     * @param array $array
     * @return bool
     */
    public function isAssoc(array $array) {
        $keys = array_keys($array);
        return array_keys($keys) !== $keys;
    }

    /**
     *
     * @param mixed $value value to check
     * @return boolean
     */
    public function isArray($value) {
        if (is_array($value)) {
            return true;
        }
        return (is_object($value) && $value instanceof \ArrayAccess);
    }

    /**
     * @param array $array
     * @param array $keys
     * @return array
     */
    public function extractFromArray(array $array, array $keys) {
        $found = array();
        if(!empty($array) && !empty($keys)) {
            foreach ($keys as $key) {
                if (isset($array[$key])) {
                    $found[$key] = $array[$key];
                }
            }
        }
        return $found;
    }

    /**
     * @param array $array
     * @param array $keys
     * @return array
     */
    public function excludeFromArray(array $array, array $keys) {
        if(!empty($array) && !empty($keys)) {
            foreach ($keys as $key) {
                if(isset($array[$key])) {
                    unset ($array[$key]);
                }
            }
        }
        return $array;
    }

    /**
     * @param array $array
     * @return bool
     */
    public function isMultiDimensional(array $array) {
        return (count($array) !== count($array, true));
    }

    /**
     * @param array $array
     * @param $key
     * @param null $default
     * @return null
     */
    public function getElement(array $array, $key, $default = null) {
        return isset($array[$key]) ? $array[$key] : $default;
    }
}