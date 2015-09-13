<?php
/**
 * Factory
 *
 * @author Kachit
 */
namespace Kachit\Underscore\Entity;

use Kachit\Underscore\Entity;

class Factory {

    /**
     * @var array
     */
    protected $typesMap = [
        'array' => 'Arrays',
        'integer' => 'Numbers',
    ];

    /**
     * @var string
     */
    protected $namespace = 'Kachit\Underscore';

    /**
     * @var Entity
     */
    protected $entity;

    /**
     * @param Entity $entity
     */
    public function __construct(Entity $entity) {
        $this->entity = $entity;
    }

    /**
     * @param $value
     * @return Entity
     */
    public function loadEntity($value) {
        $type = gettype($value);
        $type = $this->convertType($type);
        return $this->loadClass($type, $value);
    }

    protected function loadClass($type, $value) {
        $className = $this->generateClassName($type);
        $entityClassName = get_class($this->entity);
        $equals = ($className == $entityClassName);
        return ($equals) ? $this->entity->setVal($value) : new $className($value);
    }

    protected function generateClassName($type) {
        return $this->namespace . '\\' . $type;
    }

    protected function convertType($type) {
        return $this->typesMap[$type];
    }
}