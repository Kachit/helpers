<?php
/**
 * Array helper
 *
 * @author Kachit
 * @package Kachit\Helper
 */
namespace Kachit\Helper;

class ArrayHelper {

    /**
     * Fetch single dimensional array from multi dimensional array
     *
     * @param array $array
     * @param string $valueParam
     * @param string $keyParam
     * @return array
     */
    public function arrayColumn(array $array, $valueParam, $keyParam = null) {
        if (PHP_VERSION_ID >= 50500) {
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
     * Check is assoc array
     *
     * @param array $array
     * @return bool
     */
    public function isAssoc(array $array) {
        $keys = array_keys($array);
        return array_keys($keys) !== $keys;
    }

    /**
     * Check is array
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
     * Extract values list from array
     *
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
     * Extract from array with exclude
     *
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
     * Check is multi dimensional array
     *
     * @param array $array
     * @return bool
     */
    public function isMultiDimensional(array $array) {
        return (count($array) !== count($array, true));
    }

    /**
     * Get element from array
     *
     * @param array $array
     * @param string $key
     * @param string $default
     * @return mixed
     */
    public function getElement(array $array, $key, $default = null) {
        return (isset($array[$key])) ? $array[$key] : $default;
    }

    /**
     * Clear array
     *
     * @param array $array
     * @param array $filter
     * @return array
     */
    public function arrayClear(array $array, array $filter = ['', null]) {
        return array_diff($array, $filter);
    }
}