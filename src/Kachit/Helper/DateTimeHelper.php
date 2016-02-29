<?php
/**
 * Helper for works with date and time
 *
 * @author Kachit
 * @package Kachit\Helper
 */
namespace Kachit\Helper;

class DateTimeHelper
{
    // Second amounts for various time increments
    const YEAR = 31556926;
    const LEAP_YEAR = 31622400;
    const MONTH = 2629744;
    const WEEK = 604800;
    const DAY = 86400;
    const HOUR = 3600;
    const MINUTE = 60;

    const DATEFORMAT_MYSQL_DATE = 'Y-m-d';
    const DATEFORMAT_MYSQL_DATETIME = 'Y-m-d H:i:s';

    /**
     * Get dates by period
     *
     * @param mixed $startDate
     * @param mixed $endDate
     * @param string $format
     * @param int $step
     * @return array
     * @throws \Exception
     */
    public function getDatesListByPeriod($startDate, $endDate, $format = null, $step = self::DAY)
    {
        $startTimestamp = (is_int($startDate)) ? $startDate : strtotime($startDate);
        $endTimestamp = (is_int($endDate)) ? $endDate : strtotime($endDate);
        if ($startTimestamp >= $endTimestamp) {
            throw new \Exception('Dates interval is not valid');
        }
        $dates = [];
        $current = $startTimestamp;
        while($current <= $endTimestamp) {
            $dates[] = ($format) ? date($format, $current) : $current;
            $current += $step;
        }
        return $dates;
    }

    /**
     * Execute by period
     *
     * @param mixed $startDate
     * @param mixed $endDate
     * @param \Closure $function
     * @param int $step
     * @throws \Exception
     */
    public function executeByPeriod($startDate, $endDate, $function, $step = self::DAY)
    {
        $startTimestamp = (is_int($startDate)) ? $startDate : strtotime($startDate);
        $endTimestamp = (is_int($endDate)) ? $endDate : strtotime($endDate);
        if ($startTimestamp >= $endTimestamp) {
            throw new \Exception('Dates interval is not valid');
        }
        $current = $startTimestamp;
        while($current <= $endTimestamp) {
            $function($current);
            $current += $step;
        }
    }
} 