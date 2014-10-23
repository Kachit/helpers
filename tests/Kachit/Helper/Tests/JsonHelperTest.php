<?php
/**
 * Json helper test
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
     * @var
     */
    private $expectedOptionsEncode;

    /**
     * Init
     */
    protected function setUp() {
        $this->MockObject = new JsonHelper();
        $this->expectedOptionsEncode = JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;
    }

    /**
     * RTFN
     */
    public function testGenerateOptionsEncodeDefault() {
        $this->assertEquals($this->expectedOptionsEncode, $this->MockObject->generateEncodeOptions());
    }

    /**
     * RTFN
     */
    public function testEncodeByDefault() {
        $data = ['foo' => 123, 'bar' => 456, 'fi' => []];
        $jsonExpected = json_encode($data, $this->expectedOptionsEncode);
        $jsonActual = json_encode($data, $this->MockObject->generateEncodeOptions());
        $this->assertEquals($jsonExpected, $jsonActual);
    }
}