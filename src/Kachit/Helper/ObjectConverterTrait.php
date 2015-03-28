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
        $vars = [];
        $excludeFields = $this->getObjectConverterExcludeFields();
        foreach ($this as $key => $value) {
            if (!in_array($key, $excludeFields)) {
                $vars[$key] = ($this->checkClassParamIsObjectConverter($value)) ? $value->toArray() : $value;
            }
        }
        return $vars;
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
            if (array_key_exists($key, $params)) {
                $this->$key = $params[$key];
            } else {
                $this->$key = $value;
            }
        }
        return $this;
    }

    /**
     * Get object converter exclude fields
     *
     * @return array
     */
    protected function getObjectConverterExcludeFields() {
        return [];
    }

    /**
     * @param mixed $value
     * @return bool
     */
    protected function checkClassParamIsObjectConverter($value) {
        return (is_object($value) && method_exists($value, 'toArray') && method_exists($value, 'fillFromArray'));
    }
}