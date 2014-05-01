<?php
/**
 * Array helper
 *
 * @author antoxa
 * @package Kachit
 * @subpackage Helpers
 * @version 0.1
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
    public function arrayColumn(array $array, $valueParam, $keyParam = false)
    {
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
    public function isAssoc(array $array)
    {
        $keys = array_keys($array);
        return array_keys($keys) !== $keys;
    }

    /**
     * @param $array
     * @return bool
     */
    public function isValidArray($array)
    {
        if(!empty($array) && is_array($array)) {
            return true;
        }
        return false;
    }

    /**
     * @param array $array
     * @param array $keys
     * @return array
     */
    public function extractFromArray(array $array, array $keys)
    {
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
    public function excludeFromArray(array $array, array $keys)
    {
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
    public function isMultipleArray(array $array)
    {
        return (count($array) !== count($array, true));
    }

    /**
     * @param array $array
     * @param $key
     * @param null $default
     * @return null
     */
    public function getElement(array $array, $key, $default = null)
    {
        return isset($array[$key]) ? $array[$key] : $default;
    }
}