<?php
/**
 * Json decoder test
 *
 * @author Kachit
 * @package Kachit\Helper\Tests
 */
namespace Kachit\Helper\Tests\Json;

use Kachit\Helper\Json\Decoder;

class DecoderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Decoder
     */
    private $testable;

    /**
     * Init
     */
    protected function setUp()
    {
        $this->testable = new Decoder();
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
        $actual = $this->testable->setDecodeAsObject()->decode($json);
        $this->assertEquals((object)$expected, $actual);
    }
}
