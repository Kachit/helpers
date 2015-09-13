<?php
/**
 * Strings wrapper class
 * 
 * @author antoxa <kornilov@realweb.ru>
 * @property array subject
 */
namespace Kachit\Underscore;

use Kachit\Underscore\Methods\StringMethods;

class Strings extends Entity {

    /**
     * Limit words
     *
     * @param $limit
     * @return string
     */
    public function words($limit) {
        return StringMethods::words($this->value, $limit);
    }

    /**
     * @param $delimiter
     * @return Arrays
     */
    public function explode($delimiter) {
        $result = StringMethods::explode($this->value, $delimiter);
        return new Arrays($result);
    }

    /**
     * @param $filter
     * @return bool
     */
    public function validate($filter) {
        return StringMethods::validate($this->value, $filter);
    }

    /**
     * @param $replace
     * @param $subject
     * @param null $count
     * @return Strings
     */
    public function replace($replace, $subject, $count = null) {
        $result = StringMethods::replace($this->value, $replace, $subject, $count);
        return $this->setVal($result);
    }

    /**
     * @return bool
     */
    public function isIp() {
        return StringMethods::isIp($this->value);
    }

    /**
     * @return bool
     */
    public function isEmail() {
        return StringMethods::isEmail($this->value);
    }

    /**
     * @return bool
     */
    public function isUrl() {
        return StringMethods::isUrl($this->value);
    }

    /**
     * @return string
     */
    public function toCamelCase() {
        $result = StringMethods::toCamelCase($this->value);
        return $this->setVal($result);
    }

    /**
     * @return string
     */
    public function toSnakeCase() {
        $result = StringMethods::toSnakeCase($this->value);
        return $this->setVal($result);
    }

    /**
     * @param $string
     * @return $this
     */
    public function setVal($string) {
        if (!StringMethods::isString($string)) {

        }
        return parent::setVal($string);
    }
}