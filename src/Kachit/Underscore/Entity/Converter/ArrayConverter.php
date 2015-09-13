<?php

/**
 * Arrays
 *
 * @author Kachit
 */
namespace Kachit\Underscore\Entity\Converter;

use Kachit\Underscore\Entity\Converter;
use Kachit\Underscore\Methods\ArrayMethods;

class ArrayConverter extends Converter {

    /**
     * @return string
     */
    public function toString() {
        return ArrayMethods::_implode($this->value, ',');
    }

    /**
     * @return string
     */
    public function toJson() {
        return json_encode($this->value);
    }

    /**
     * @return object
     */
    public function toObject() {
        return (object) $this->value;
    }
}