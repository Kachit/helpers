<?php
/**
 * Strings wrapper class
 * 
 * @author antoxa <kornilov@realweb.ru>
 * @property array subject
 */
namespace Kachit\Underscore;

use Kachit\Underscore\Methods\NumberMethods;

class Numbers extends Entity {

    /**
     * @return bool
     */
    public function isInt() {
        return NumberMethods::isInt($this->value);
    }

    /**
     * @return bool
     */
    public function isFloat() {
        return NumberMethods::isFloat($this->value);
    }

    /**
     * @return bool
     */
    public function isDouble() {
        return NumberMethods::isDouble($this->value);
    }

    /**
     * @param int $precision
     * @param int $mode
     * @return Numbers
     */
    public function round($precision = 0, $mode = PHP_ROUND_HALF_UP) {
        $result = NumberMethods::round($this->val(), $precision, $mode);
        return $this->setVal($result);
    }

    /**
     * @param $number
     * @return $this
     */
    public function setVal($number) {
        if (!NumberMethods::isNumber($number)) {

        }
        return parent::setVal($number);
    }
}