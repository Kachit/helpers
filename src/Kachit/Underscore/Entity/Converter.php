<?php
/**
 * Converter
 *
 * @author Kachit
 * @package Kachit\Underscore\Entity
 */
namespace Kachit\Underscore\Entity;

class Converter {

    protected $value;

    public function __construct($value) {
        $this->value = $value;
    }
}