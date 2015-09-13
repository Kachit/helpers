<?php
/**
 * Arrays wrapper class
 * 
 * @author antoxa <kornilov@realweb.ru>
 *
 */
namespace Kachit\Underscore;

use Kachit\Underscore\Entity\Converter;
use Kachit\Underscore\Methods\ArrayMethods;

/**
 * Arrays
 *
 * @method bool has($index)
 * @method Numbers count($index)
 * @mixin ArrayMethods
 */
class Arrays extends Entity implements \JsonSerializable {

    /**
     * @var string
     */
    protected static $methodsClass = 'ArrayMethods';

    /**
     * @param array $array
     */
    public function __construct(array $array) {
        parent::__construct($array);
    }

    /**
     * @param array $value
     * @return Arrays
     */
    public static function from(array $value) {
        return new self($value);
    }

    /**
     * @param string $jsonString
     * @return Arrays
     */
    public static function fromJson($jsonString) {
        return new self(json_decode($jsonString, true));
    }

    /**
     * @return array
     */
    public function jsonSerialize() {
        return $this->val();
    }

    /**
     * Transform subject to Strings on toString.
     *
     * @return string
     */
    public function __toString() {
        return $this->convert()->toString();
    }

    /**
     * @return Converter\ArrayConverter
     */
    public function convert() {
        return new Converter\ArrayConverter($this->val());
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function __set($key, $value) {
        return $this->value[$key] = $value;
    }
}