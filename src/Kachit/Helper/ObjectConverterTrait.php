<?php
/**
 * Object converter trait
 *
 * @author Kachit
 */
namespace Kachit\Helper;

trait ObjectConverterTrait {

    /**
     * To array
     *
     * @return array
     */
    public function toArray() {
        return get_object_vars($this);
    }

    /**
     * Fill from array
     *
     * @param array $params
     * @return $this;
     */
    public function fillFromArray(array $params) {
        $expectedParams = $this->toArray();
        foreach ($expectedParams as $key => $value) {
            $this->$key = (array_key_exists($key, $params)) ? $params[$key] : $value;
        }
        return $this;
    }
} 