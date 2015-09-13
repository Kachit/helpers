<?php
/**
 * Array static methods class
 * 
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Underscore\Methods;

class ArrayMethods extends AbstractMethods {

    /**
     * @param array $array
     * @param bool $multiDimensional
     * @return int
     */
    public static function _count(array $array, $multiDimensional = false) {
        return count($array, $multiDimensional);
    }

    /**
     * @param array $array
     * @param $index
     * @param null $default
     * @return mixed
     */
    public static function _get(array $array, $index, $default = null) {
        return (self::_has($array, $index)) ? $array[$index] : $default;
    }

    /**
     * @param array $array
     * @param $index
     * @param $value
     * @return array
     */
    public static function _set(array $array, $index, $value) {
        $array[$index] = $value;
        return $array;
    }

    /**
     * Clean all falsy values from an array.
     *
     * @param array $array
     * @return array
     */
    public static function _clean(array $array) {
        return static::_filter($array, function ($value) {
            return (bool) $value;
        });
    }

    /**
     * @param array $array
     * @param $value
     * @return array
     */
    public static function _prepend(array $array, $value) {
        array_unshift($array, $value);
        return $array;
    }

    /**
     * @param array $array
     * @param mixed $value
     * @return mixed
     */
    public static function _append(array $array, $value) {
        array_push($array, $value);
        return $array;
    }

    /**
     * @param array $array
     * @param string $glue
     * @return string
     */
    public static function _implode(array $array, $glue) {
        return implode($glue, $array);
    }

    /**
     * @param array $array
     * @param $index
     * @return bool
     */
    public static function _has(array $array, $index) {
        return array_key_exists($index, $array);
    }

    /**
     * Extract values list from array
     *
     * @param array $array
     * @param array $keys
     * @return array
     */
    public static function _extract(array $array, array $keys) {
        $found = [];
        if($array && $keys) {
            foreach ($keys as $key) {
                if (self::_has($array, $key)) {
                    $found[$key] = $array[$key];
                }
            }
        }
        return $found;
    }

    /**
     * Delete element from array
     *
     * @param array $array
     * @param $key
     * @return bool
     */
    public static function _delete(array &$array, $key) {
        $result = false;
        if (self::_has($array, $key)) {
            unset($array[$key]);
            $result = true;
        }
        return $result;
    }

    /**
     * Extract from array with exclude
     *
     * @param array $array
     * @param array $keys
     * @return array
     */
    public static function _exclude(array $array, array $keys) {
        if($array && $keys) {
            foreach ($keys as $key) {
                self::_delete($array, $key);
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
    public static function _isMultiDimensional(array &$array) {
        return (count($array) !== count($array, true));
    }

    /**
     * @param array $array
     * @param \Closure $callback
     * @return array
     */
    public static function _filter(array $array, \Closure $callback) {
        return array_filter($array, $callback);
    }

    /**
     * @param array $array
     * @param \Closure $callback
     * @return mixed
     */
    public static function _find(array $array, \Closure $callback) {
        foreach ($array as $key => $value) {
            if ($callback($value, $key)) {
                return $value;
            }
        }
        return false;
    }

    /**
     * @param array $array
     * @param \Closure $callback
     */
    public static function _each(array $array, \Closure $callback) {
        foreach ($array as $key => $value) {
            $callback($key, $value);
        }
    }

    /**
     * Fetch single dimensional array from multi dimensional array (array_column analog)
     *
     * @param array $array
     * @param string $valueParam
     * @param string $keyParam
     * @return array
     */
    public static function _flatten(array $array, $valueParam, $keyParam = null) {
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
    public static function _isAssoc(array &$array) {
        $keys = array_keys($array);
        return array_keys($keys) !== $keys;
    }

    /**
     * @param $value
     * @return bool
     */
    public static function _isValid($value) {
        return self::_isArray($value);
    }

    /**
     * Check is array
     *
     * @param mixed $value value to check
     * @return boolean
     */
    public static function _isArray($value) {
        if (is_array($value)) {
            return true;
        }
        return (is_object($value) && $value instanceof \ArrayAccess);
    }
}