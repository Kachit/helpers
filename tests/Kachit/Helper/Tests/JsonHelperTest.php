<?php
/**
 * String helper test
 *
 * @author Kachit
 * @package Kachit\Helper\Tests
 */
namespace Kachit\Helper\Tests;

use Kachit\Helper\Testable\JsonHelper;

class JsonHelperTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var JsonHelper
     */
    private $MockObject;

    /**
     * Init
     */
    protected function setUp() {
        $this->MockObject = new JsonHelper();
    }

    public function test() {
        var_dump($this->MockObject);
    }
}