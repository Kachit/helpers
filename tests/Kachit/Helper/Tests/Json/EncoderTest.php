<?php
/**
 * Json decoder test
 *
 * @author Kachit
 * @package Kachit\Helper\Tests
 */
namespace Kachit\Helper\Tests\Json;

use Kachit\Helper\Json\Encoder;

class EncoderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Encoder
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp()
    {
        $this->testable = new Encoder();
    }

    public function testEncodeByDefault()
    {
        $optionsEncode = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;
        $data = ['foo' => 123, 'bar' => 456, 'fi' => []];
        $jsonExpected = json_encode($data, $optionsEncode);
        $jsonActual = $this->testable->encode($data);
        $this->assertEquals($jsonExpected, $jsonActual);
    }

    public function testEncodeWithPrettyPrint()
    {
        $optionsEncode = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT;
        $data = ['foo' => 123, 'bar' => 456, 'fi' => []];
        $jsonExpected = json_encode($data, $optionsEncode);
        $this->testable->enablePrettyPrint();
        $jsonActual = $this->testable->encode($data);
        $this->assertEquals($jsonExpected, $jsonActual);
    }
}
