<?php
/**
 * Array helper test
 * 
 * @author Kachit
 * @package Kachit\Helper\Tests
 */
namespace Kachit\Helper\Tests;

use Kachit\Helper\ArrayHelper;

class ArrayHelperTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var ArrayHelper
     */
    private $Testable;

    /**
     * Init
     */
    protected function setUp() {
        $this->Testable = new ArrayHelper();
    }

    /**
     * RTFN
     */
    public function testIsArraySimpleArray() {
        $array = [1, 2, 3];
        $result = $this->Testable->isArray($array);
        $this->assertTrue($result);
    }

    /**
     * RTFN
     */
    public function testIsArrayBad() {
        $bad = 'foo';
        $result = $this->Testable->isArray($bad);
        $this->assertFalse($result);
    }

    /**
     * RTFN
     */
    public function testIsMultipleArray() {
        $array = [
            [1, 2, 3],
            [1, 2, 3],
        ];
        $result = $this->Testable->isMultiDimensional($array);
        $this->assertTrue($result);
    }

    /**
     * RTFN
     */
    public function testExtractFromArray() {
        $array = [
            'cwer1' => 1,
            'cwer2' => 2,
            'cwer3' => 3,
            'cwer4' => 4,
            'cwer5' => 5,
        ];

        $expected = [
            'cwer1' => 1,
            'cwer2' => 2,
            'cwer3' => 3,
        ];

        $result = $this->Testable->extractFromArray($array, ['cwer1', 'cwer2', 'cwer3']);
        $this->assertNotEmpty($result);
        $this->assertTrue(is_array($result));
        $this->assertTrue(($result === $expected));
    }

    /**
     * RTFN
     */
    public function testExcludeFromArray() {
        $array = [
            'cwer1' => 1,
            'cwer2' => 2,
            'cwer3' => 3,
            'cwer4' => 4,
            'cwer5' => 5,
        ];

        $expected = [
            'cwer1' => 1,
            'cwer2' => 2,
            'cwer3' => 3,
        ];

        $result = $this->Testable->excludeFromArray($array, ['cwer4', 'cwer5']);
        $this->assertNotEmpty($result);
        $this->assertTrue(is_array($result));
        $this->assertTrue(($result === $expected));
    }

    /**
     * RTFN
     */
    public function testGetElementIssetKey() {
        $array = array(
            'cwer1' => 'qwerty',
            'cwer2' => 2,
            'cwer3' => 3,
            'cwer4' => 4,
            'cwer5' => 5,
        );
        $result = $this->Testable->getElement($array, 'cwer1');
        $this->assertNotEmpty($result);
        $this->assertTrue(is_string($result));
        $this->assertEquals('qwerty', $result);

    }

    /**
     * RTFN
     */
    public function testGetElementNotIssetKey() {
        $array = [
            'cwer1' => 'qwerty',
            'cwer2' => 2,
            'cwer3' => 3,
            'cwer4' => 4,
            'cwer5' => 5,
        ];

        $result = $this->Testable->getElement($array, 'cwer6', 'qwerty');
        $this->assertNotEmpty($result);
        $this->assertTrue(is_string($result));
        $this->assertEquals('qwerty', $result);
    }

    /**
     * RTFN
     */
    public function testArrayColumnValue() {
        $array = [
            [
                'cwer1' => 'qwerty1',
                'cwer2' => 1,
                'cwer3' => 3,
                'cwer4' => 4,
                'cwer5' => 5,
            ],

            [
                'cwer1' => 'qwerty2',
                'cwer2' => 2,
                'cwer3' => 3,
                'cwer4' => 4,
                'cwer5' => 5,
            ]
        ];
        $result = $this->Testable->arrayColumn($array, 'cwer1');
        $this->assertNotEmpty($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals('qwerty1', $result[0]);
        $this->assertEquals('qwerty2', $result[1]);
    }

    /**
     * RTFN
     */
    public function testArrayColumnKeyValue() {
        $array = [
            [
                'cwer1' => 'qwerty1',
                'cwer2' => 'foo',
                'cwer3' => 3,
                'cwer4' => 4,
                'cwer5' => 5,
            ],

            [
                'cwer1' => 'qwerty2',
                'cwer2' => 'bar',
                'cwer3' => 3,
                'cwer4' => 4,
                'cwer5' => 5,
            ],
        ];
        $result = $this->Testable->arrayColumn($array, 'cwer1', 'cwer2');
        $this->assertNotEmpty($result);
        $this->assertTrue(is_array($result));
        $this->assertArrayHasKey('foo', $result);
        $this->assertArrayHasKey('bar', $result);
        $this->assertEquals('qwerty1', $result['foo']);
        $this->assertEquals('qwerty2', $result['bar']);
    }

    /**
     * RTFN
     */
    public function testArrayIsAssocIsTrue() {
        $array = [
            'cwer1' => 'qwerty',
            'cwer2' => 2,
            'cwer3' => 3,
            'cwer4' => 4,
            'cwer5' => 5,
        ];
        $result = $this->Testable->isAssoc($array);
        $this->assertTrue($result);
    }

    /**
     * RTFN
     */
    public function testArrayIsAssocIsFalse() {
        $array = [1, 2, 3];
        $result = $this->Testable->isAssoc($array);
        $this->assertFalse($result);
    }

    /**
     * RTFN
     */
    public function testClearArray() {
        $array = ['foo' => 1, null, 'bar' => 2, 'boo' => ''];
        $result = $this->Testable->arrayClear($array);
        $this->assertEquals(2, count($result));
        $this->assertArrayNotHasKey('boo', $result);
    }

    /**
     * RTFN
     */
    public function testClearArrayWithCustomFilter() {
        $array = ['foo' => 1, 'bar' => 2, 'boo' => ''];
        $filter = [1, 2];
        $result = $this->Testable->arrayClear($array, $filter);
        $this->assertEquals(1, count($result));
        $this->assertArrayHasKey('boo', $result);
    }
}