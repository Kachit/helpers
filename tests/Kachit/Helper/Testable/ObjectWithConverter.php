<?php
/**
 * ObjectWithConverter
 *
 * @author antoxa <kornilov@realweb.ru>
 * @package Kachit\Helper\Testable
 */
namespace Kachit\Helper\Testable;

use Kachit\Helper\ObjectConverterTrait;

class ObjectWithConverter {

    use ObjectConverterTrait;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $age;

    /**
     * @var string
     */
    protected $email;

    /**
     * Get Age
     *
     * @return int
     */
    public function getAge() {
        return $this->age;
    }

    /**
     * Set Age
     *
     * @param int $age
     * @return $this
     */
    public function setAge($age) {
        $this->age = $age;
        return $this;
    }

    /**
     * Get Email
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set Email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    /**
     * Get Id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set Id
     *
     * @param int $id
     * @return $this
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Get Name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set Name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }
} 