<?php
/**
 * ObjectConverterTest
 *
 * @author antoxa <kornilov@realweb.ru>
 * @package Kachit\Helper\Tests
 */
namespace Kachit\Helper\Tests;

use Kachit\Helper\Testable\ObjectWithConverter;

class ObjectConverterTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var ObjectWithConverter
     */
    protected $testable;

    /**
     * Init
     */
    protected function setUp() {
        $this->testable = new ObjectWithConverter();
        $this->testable
            ->setId(1)
            ->setName('Mike')
            ->setAge(20)
            ->setEmail('foo@bar')
        ;
    }

    /**
     * RTFN
     */
    public function testToArray() {
        $expected = ['id' => 1, 'name' => 'Mike', 'age' => 20, 'email' => 'foo@bar'];
        $result = $this->testable->toArray();
        $this->assertNotEmpty($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals($expected, $result);
    }

    /**
     * RTFN
     */
    public function testFillFromArray() {
        $expected = ['id' => 2, 'name' => 'Spike', 'age' => 30, 'city' => 'LA',];
        $this->testable->fillFromArray($expected);
        $this->assertEquals($expected['id'], $this->testable->getId());
        $this->assertEquals($expected['name'], $this->testable->getName());
        $this->assertEquals($expected['age'], $this->testable->getAge());
        $this->assertEquals('foo@bar', $this->testable->getEmail());
        $result = $this->testable->toArray();
        $this->assertArrayNotHasKey('city', $result);
    }
}
 