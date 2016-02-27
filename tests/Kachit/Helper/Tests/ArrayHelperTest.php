<?php
/**
 * Array helper test
 * 
 * @author Kachit
 * @package Kachit\Helper\Tests
 */
namespace Kachit\Helper\Tests;

use Kachit\Helper\ArrayHelper;

class ArrayHelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ArrayHelper
     */
    private $Testable;

    /**
     * Init
     */
    protected function setUp()
    {
        $this->Testable = new ArrayHelper();
    }

    public function testIsArraySimpleArray()
    {
        $array = [1, 2, 3];
        $result = $this->Testable->isArray($array);
        $this->assertTrue($result);
    }

    public function testIsArrayBad()
    {
        $bad = 'foo';
        $result = $this->Testable->isArray($bad);
        $this->assertFalse($result);
    }

    public function testIsMultipleArray()
    {
        $array = [
            [1, 2, 3],
            [1, 2, 3],
        ];
        $result = $this->Testable->isMultiDimensional($array);
        $this->assertTrue($result);
    }

    public function testExtractFromArray()
    {
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

        $result = $this->Testable->extract($array, ['cwer1', 'cwer2', 'cwer3']);
        $this->assertNotEmpty($result);
        $this->assertTrue(is_array($result));
        $this->assertTrue(($result === $expected));
    }

    public function testExcludeFromArray()
    {
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

        $result = $this->Testable->exclude($array, ['cwer4', 'cwer5']);
        $this->assertNotEmpty($result);
        $this->assertTrue(is_array($result));
        $this->assertTrue(($result === $expected));
    }

    public function testGetElementIssetKey()
    {
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

    public function testGetElementNotIssetKey()
    {
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

    public function testArrayColumnValue()
    {
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
        $result = $this->Testable->flatten($array, 'cwer1');
        $this->assertNotEmpty($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals('qwerty1', $result[0]);
        $this->assertEquals('qwerty2', $result[1]);
    }

    public function testArrayColumnKeyValue()
    {
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
        $result = $this->Testable->flatten($array, 'cwer1', 'cwer2');
        $this->assertNotEmpty($result);
        $this->assertTrue(is_array($result));
        $this->assertArrayHasKey('foo', $result);
        $this->assertArrayHasKey('bar', $result);
        $this->assertEquals('qwerty1', $result['foo']);
        $this->assertEquals('qwerty2', $result['bar']);
    }

    public function testArrayIsAssocIsTrue()
    {
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

    public function testArrayIsAssocIsFalse()
    {
        $array = [1, 2, 3];
        $result = $this->Testable->isAssoc($array);
        $this->assertFalse($result);
    }

    public function testClearArray()
    {
        $array = ['foo' => 1, null, 'bar' => 2, 'boo' => ''];
        $result = $this->Testable->clear($array);
        $this->assertEquals(2, count($result));
        $this->assertArrayNotHasKey('boo', $result);
    }

    public function testClearArrayWithCustomFilter()
    {
        $array = ['foo' => 1, 'bar' => 2, 'boo' => ''];
        $filter = [1, 2];
        $result = $this->Testable->clear($array, $filter);
        $this->assertEquals(1, count($result));
        $this->assertArrayHasKey('boo', $result);
    }

    public function testInsertAfterAddByKey()
    {
        $test = ['id' => 1, 'name' => 'John', 'age' => 20, ];
        $result = $this->Testable->insert($test, 'name', ['lastName' => 'Smith']);
        $this->assertNotEmpty($result);
        $this->assertTrue(is_array($result));
        $this->assertArrayHasKey('lastName', $result);
        $this->assertEquals(4, count($result));
        array_pop($result);
        $this->assertEquals('Smith', array_pop($result));
    }

    public function testInsertAfterAddByIndex()
    {
        $test = [1, 2, 3, 5];
        $expected = [1, 2, 3, 4, 5];
        $result = $this->Testable->insertAfter($test, 2, [4]);
        $this->assertNotEmpty($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals(5, count($result));
        $this->assertEquals($expected, $result);
    }

    public function testInsertBeforeAddByIndex()
    {
        $test = [1, 3, 4, 5];
        $expected = [1, 2, 3, 4, 5];
        $result = $this->Testable->insert($test, 1, [2], 'before');
        $this->assertNotEmpty($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals(5, count($result));
        $this->assertEquals($expected, $result);
    }

    public function testInsertBeforeAddByKey()
    {
        $test = ['name' => 'John', 'age' => 20, ];
        $result = $this->Testable->insertBefore($test, 'name', ['id' => 1]);
        $this->assertNotEmpty($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals(3, count($result));
        $this->assertEquals(1, array_shift($result));
    }

    public function testInsertAfterWithUnavailableKey()
    {
        $test = ['id' => 1, 'name' => 'John', 'age' => 20, ];
        $result = $this->Testable->insertAfter($test, 'email', ['active' => 1]);
        $this->assertNotEmpty($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals(4, count($result));
        $this->assertEquals(1, array_pop($result));
    }
}