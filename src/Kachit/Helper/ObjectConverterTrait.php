<?php
/**
 * ObjectConverterTrait
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
            $this->$key = (isset($params[$key])) ? $params[$key] : $value;
        }
        return $this;
    }
} 