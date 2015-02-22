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
    private $testable;

    /**
     * Init
     */
    protected function setUp() {
        $this->testable = new JsonHelper();
    }

    public function testEncodeByDefault() {
        $optionsEncode = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;
        $data = ['foo' => 123, 'bar' => 456, 'fi' => []];
        $jsonExpected = json_encode($data, $optionsEncode);
        $jsonActual = $this->testable->getEncoder()->encode($data);
        $this->assertEquals($jsonExpected, $jsonActual);
    }

    public function testEncodeWithPrettyPrint() {
        $optionsEncode = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT;
        $data = ['foo' => 123, 'bar' => 456, 'fi' => []];
        $jsonExpected = json_encode($data, $optionsEncode);
        $this->testable->getEncoder()->enablePrettyPrint();
        $jsonActual = $this->testable->getEncoder()->encode($data);
        $this->assertEquals($jsonExpected, $jsonActual);
    }
}