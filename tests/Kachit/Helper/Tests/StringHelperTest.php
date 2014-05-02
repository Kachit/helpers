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

    protected function setUp() {
        $this->MockObject = new StringHelper();
    }

    public function testConvertToCamelCase() {
        $table_name = 'table_name';
        $result = $this->MockObject->convertToCamelCase($table_name);
        $this->assertNotEmpty($result);
        $this->assertTrue(is_string($result));
        $this->assertEquals('tableName', $result);
        $result = $this->MockObject->convertToCamelCase($table_name, false);
        $this->assertEquals('TableName', $result);
    }

    public function testConvertToUnderscore() {
        $test = 'StringHelperTest';
        $result = $this->MockObject->convertToUnderscore($test);
        $this->assertNotEmpty($result);
        $this->assertTrue(is_string($result));
        $this->assertEquals('string_helper_test', $result);
    }
}