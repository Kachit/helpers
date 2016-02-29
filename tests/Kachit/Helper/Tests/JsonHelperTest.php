<?php
/**
 * Json helper test
 *
 * @author Kachit
 * @package Kachit\Helper\Tests
 */
namespace Kachit\Helper\Tests;

use Kachit\Helper\Testable\JsonHelper;

class JsonHelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var JsonHelper
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp()
    {
        $this->testable = new JsonHelper();
    }

    public function testEncodeByDefault()
    {
        $optionsEncode = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;
        $data = ['foo' => 123, 'bar' => 456, 'fi' => []];
        $jsonExpected = json_encode($data, $optionsEncode);
        $jsonActual = $this->testable->encode($data);
        $this->assertEquals($jsonExpected, $jsonActual);
    }

    public function testEncodeScalar()
    {
        $data = [123];
        $jsonExpected = json_encode($data);
        $jsonActual = $this->testable->encode(123);
        $this->assertEquals($jsonExpected, $jsonActual);
    }

    public function testGetEncoder()
    {
        $result = $this->testable->getEncoder();
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Helper\Json\Encoder', $result);
    }

    public function testGetDecoder()
    {
        $result = $this->testable->getDecoder();
        $this->assertTrue(is_object($result));
        $this->assertInstanceOf('Kachit\Helper\Json\Decoder', $result);
    }

    public function testEncodeWithPrettyPrint()
    {
        $optionsEncode = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT;
        $data = ['foo' => 123, 'bar' => 456, 'fi' => []];
        $jsonExpected = json_encode($data, $optionsEncode);
        $this->testable->getEncoder()->enablePrettyPrint();
        $jsonActual = $this->testable->encode($data);
        $this->assertEquals($jsonExpected, $jsonActual);
    }

    public function testDecodeByDefault()
    {
        $expected = ['foo' => 123, 'bar' => 456, 'fi' => []];
        $json = json_encode($expected);
        $actual = $this->testable->decode($json);
        $this->assertEquals($expected, $actual);
    }

    public function testDecodeAsObject()
    {
        $expected = ['foo' => 123, 'bar' => 456, 'fi' => []];
        $json = json_encode($expected);
        $actual = $this->testable->getDecoder()->setDecodeAsObject()->decode($json);
        $this->assertEquals((object)$expected, $actual);
    }
}