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
    const INSERT_TYPE_AFTER = 'after';
    const INSERT_TYPE_BEFORE = 'before';

    /**
     * @var array
     */
    protected $insertTypes = [
        self::INSERT_TYPE_AFTER,
        self::INSERT_TYPE_BEFORE,
    ];

    /**
     * Fetch single dimensional array from multi dimensional array (array_column analog)
     *
     * @param array $array
     * @param string $valueParam
     * @param string $keyParam
     * @return array
     */
    public function flatten(array $array, $valueParam, $keyParam = null)
    {
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
    public function isAssoc(array &$array)
    {
        $keys = array_keys($array);
        return array_keys($keys) !== $keys;
    }

    /**
     * Check is array
     *
     * @param mixed $value value to check
     * @return boolean
     */
    public function isArray($value)
    {
        if (is_array($value)) {
            return true;
        }
        return (is_object($value) && $value instanceof \ArrayAccess);
    }

    /**
     * Check for key exists
     *
     * @param array $array
     * @param mixed $key
     * @return bool
     */
    public function has(array $array, $key)
    {
        return array_key_exists($key, $array);
    }

    /**
     * Delete element from array
     *
     * @param array $array
     * @param $key
     * @return bool
     */
    public function delete(array &$array, $key)
    {
        $result = false;
        if ($this->has($array, $key)) {
            unset($array[$key]);
            $result = true;
        }
        return $result;
    }

    /**
     * Extract values list from array
     *
     * @param array $array
     * @param array $keys
     * @return array
     */
    public function extract(array $array, array $keys)
    {
        $found = [];
        if($array && $keys) {
            foreach ($keys as $key) {
                if ($this->has($array, $key)) {
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
    public function exclude(array $array, array $keys)
    {
        if($array && $keys) {
            foreach ($keys as $key) {
                $this->delete($array, $key);
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
    public function isMultiDimensional(array &$array)
    {
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
    public function getElement(array &$array, $key, $default = null)
    {
        return (array_key_exists($key, $array)) ? $array[$key] : $default;
    }

    /**
     * Clear array by filter
     *
     * @param array $array
     * @param array $filter
     * @return array
     */
    public function clear(array $array, array $filter = ['', null])
    {
        return array_diff($array, $filter);
    }

    /**
     * Insert after
     *
     * @param array $array
     * @param array $insert
     * @param mixed $key
     * @param string $position
     * @return array
     */
    public function insert(array $array, $key, array $insert, $position = self::INSERT_TYPE_AFTER)
    {
        if (!in_array($position, $this->insertTypes)) {
            return false;
        }
        $keyPosition = array_search($key, array_keys($array));
        if (self::INSERT_TYPE_AFTER == $position) {
            $keyPosition++;
        }

        if (false !== $keyPosition ) {
            $result = array_slice($array, 0, $keyPosition);
            $result = array_merge($result, $insert);
            $result = array_merge($result, array_slice($array, $keyPosition));
        } else {
            $result = array_merge($array, $insert);
        }
        return $result;
    }

    /**
     * Insert after
     *
     * @param array $array
     * @param mixed $key
     * @param array $insert
     * @return array
     */
    public function insertAfter(array $array, $key, array $insert)
    {
        return $this->insert($array, $key, $insert);
    }

    /**
     * Insert before
     *
     * @param array $array
     * @param mixed $key
     * @param array $insert
     * @return array
     */
    public function insertBefore(array $array, $key, array $insert)
    {
        return $this->insert($array, $key, $insert, self::INSERT_TYPE_BEFORE);
    }
}