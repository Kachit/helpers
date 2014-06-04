<?php
/**
 * Helpers traits test
 *
 * @author antoxa <kornilov@realweb.ru>
 * @package Kachit\Helper\Tests
 */
namespace Kachit\Helper\Tests;

use Kachit\Helper\Testable\ObjectWithHelpersTraits;

class HelpersTraitsTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var ObjectWithHelpersTraits
     */
    protected $testable;

    /**
     * Init
     */
    protected function setUp() {
        $this->testable = new ObjectWithHelpersTraits();
    }

    /**
     * RTFN
     */
    public function testGetArrayHelper() {
        $result = $this->testable->getArrayHelper();
        $this->assertNotEmpty($result);
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Helper\ArrayHelper', $result);
    }

    /**
     * RTFN
     */
    public function testGetStringHelper() {
        $result = $this->testable->getStringHelper();
        $this->assertNotEmpty($result);
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Helper\StringHelper', $result);
    }

    /**
     * RTFN
     */
    public function testGetDateTimeHelper() {
        $result = $this->testable->getDateTimeHelper();
        $this->assertNotEmpty($result);
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Helper\DateTimeHelper', $result);
    }
}
 