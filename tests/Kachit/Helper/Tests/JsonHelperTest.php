<?php
/**
 * Array helper test
 *
 * @author Kachit
 * @package Kachit\Helper\Tests
 */
namespace Kachit\Helper\Tests;

use Kachit\Helper\JsonHelper;

class JsonHelperTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var JsonHelper
     */
    private $testable;

    protected function setUp() {
        $this->testable = new JsonHelper();
    }

    public function testIsValidJson() {
        $result = $this->testable->isValidJson('123456');
    }
}
 