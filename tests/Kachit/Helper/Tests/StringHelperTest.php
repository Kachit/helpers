<?php
/**
 * String helper test
 *
 * @author Kachit
 * @package Kachit\Helper\Tests
 */
namespace Kachit\Helper\Tests;

use Kachit\Helper\StringHelper;

class StringHelperTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var StringHelper
     */
    private $MockObject;

    /**
     * Init
     */
    protected function setUp() {
        $this->MockObject = new StringHelper();
    }

    /**
     * RTFN
     */
    public function testConvertToCamelCase() {
        $table_name = 'table_name';
        $result = $this->MockObject->convertToCamelCase($table_name);
        $this->assertNotEmpty($result);
        $this->assertTrue(is_string($result));
        $this->assertEquals('tableName', $result);
        $result = $this->MockObject->convertToCamelCase($table_name, false);
        $this->assertEquals('TableName', $result);
    }

    /**
     * RTFN
     */
    public function testConvertToUnderscore() {
        $test = 'StringHelperTest';
        $result = $this->MockObject->convertToUnderscore($test);
        $this->assertNotEmpty($result);
        $this->assertTrue(is_string($result));
        $this->assertEquals('string_helper_test', $result);
    }

    /**
     * RTFN
     */
    public function testLimitWords() {
        $text = 'Apply a user function to every member of an array';
        $result = $this->MockObject->limitWords($text, 5);
        $this->assertNotEmpty($result);
        $this->assertTrue(is_string($result));
        $this->assertEquals('Apply a user function to...', $result);
    }
}