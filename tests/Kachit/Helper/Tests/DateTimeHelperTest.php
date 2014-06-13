<?php
/**
 * DateTimeHelperTest
 *
 * @author Kachit
 */
namespace Kachit\Helper\Tests;
use Kachit\Helper\DateTimeHelper;

class DateTimeHelperTest extends \PHPUnit_Framework_TestCase  {

    /**
     * @var DateTimeHelper
     */
    protected $testable;

    /**
     * Set up
     */
    protected function setUp() {
        $this->testable = new DateTimeHelper();
    }

    /**
     * RTFN
     */
    public function testGetDatesByPeriodSimple() {
        $startDate = '2014-05-05';
        $endDate = '2014-05-20';
        $result = $this->testable->getDatesListByPeriod($startDate, $endDate, 'Y-m-d');
        $this->assertNotEmpty($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals(16, count($result));
        $this->assertEquals('2014-05-05', array_shift($result));
        $this->assertEquals('2014-05-20', array_pop($result));
    }

    /**
     * RTFN
     */
    public function testGetDatesByPeriodWithoutFormat() {
        $startDate = strtotime('2014-05-05');
        $endDate = strtotime('2014-05-20');
        $result = $this->testable->getDatesListByPeriod($startDate, $endDate);
        $this->assertNotEmpty($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals(16, count($result));
        $this->assertEquals($startDate, array_shift($result));
        $this->assertEquals($endDate, array_pop($result));
    }

    /**
     * RTFN
     * @expectedException \Exception
     * @expectedExceptionMessage Dates interval is not valid
     */
    public function testGetDatesByPeriodWrongInterval() {
        $startDate = '2014-05-30';
        $endDate = '2014-05-20';
        $this->testable->getDatesListByPeriod($startDate, $endDate);
    }

    /**
     * RTFN
     */
    public function testGetDatesByPeriodWithCustomStep() {
        $startDate = '2014-05-05';
        $endDate = '2014-05-10';
        $result = $this->testable->getDatesListByPeriod($startDate, $endDate, 'Y-m-d H:i:s', DateTimeHelper::HOUR);
        $this->assertNotEmpty($result);
        $this->assertTrue(is_array($result));
        $this->assertEquals(121, count($result));
        $this->assertEquals('2014-05-05 00:00:00', array_shift($result));
        $this->assertEquals('2014-05-10 00:00:00', array_pop($result));
    }

    /**
     * RTFN
     */
    public function testExecuteByPeriodWithUse() {
        $startDate = '2014-05-05';
        $endDate = '2014-05-20';
        $index = 0;
        $function = function() use (&$index) {
            $index++;
        };
        $this->testable->executeByPeriod($startDate, $endDate, $function);
        $this->assertEquals(16, $index);
    }

    /**
     * RTFN
     */
    public function testExecuteByPeriodWithArgument() {
        $startDate = strtotime('2014-05-05');
        $endDate = strtotime('2014-05-20');
        $data = [];
        $function = function($current) use (&$data) {
            $data[] = $current;
        };
        $this->testable->executeByPeriod($startDate, $endDate, $function);
        $this->assertEquals(16, count($data));
        $this->assertEquals($startDate, array_shift($data));
        $this->assertEquals($endDate, array_pop($data));
    }
}
 