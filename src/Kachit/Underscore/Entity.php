<?php
/**
 * Base Entity class
 * 
 * @author antoxa <kornilov@realweb.ru>
 */
namespace Kachit\Underscore;

use Kachit\Underscore\Entity\Factory as EntityFactory;
use Kachit\Underscore\Entity\Converter;

use Kachit\Underscore\Methods\AbstractMethods;
use Kachit\Underscore\Methods\Factory as MethodFactory;

abstract class Entity {

    /**
     * @var mixed
     */
    protected $value;

    /**
     * @var EntityFactory
     */
    protected $entitiesFactory;

    /**
     * @var string
     */
    protected static $methodsClass;

    /**
     * @param $value
     */
    public function __construct($value) {
        $this->setVal($value);
    }

    /**
     * @param mixed $value
     * @return static
     */
    public static function from($value) {
        return new static($value);
    }

    /**
     * Check if the subject is empty.
     *
     * @return bool
     */
    public function isEmpty() {
        return AbstractMethods::_isEmpty($this->val());
    }

    /**
     * @return Converter
     */
    abstract public function convert();

    /**
     * Transform subject to Strings on toString.
     *
     * @return string
     */
    public function __toString() {
        return $this->val();
    }

    /**
     * @return mixed
     */
    public function val() {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function setVal($value) {
        $this->value = $value;
        return $this;
    }

    /**
     * Get entitiesFactory
     *
     * @return EntityFactory
     */
    protected function getEntitiesFactory() {
        if (empty($this->entitiesFactory)) {
            $this->entitiesFactory = new EntityFactory($this);
        }
        return $this->entitiesFactory;
    }

    /**
     * @param $method
     * @param $params
     * @return mixed
     */
    public static function __callStatic($method, $params) {
        $methodsClass = MethodFactory::getMethodsClassName(static::$methodsClass);
        return $methodsClass::$method($params[0], $params[1]);
    }

    /**
     * @param $method
     * @param $params
     * @return $this
     */
    public function __call($method, $params) {
        $methodsClass = MethodFactory::getMethodsClassName(static::$methodsClass);
        $method = '_' . $method;
        $result = $methodsClass::$method($this->val(), $params[0]);
        return $this->getEntitiesFactory()->loadEntity($result);
    }
}