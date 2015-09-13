<?php
/**
 * Arrays wrapper class
 * 
 * @author antoxa <kornilov@realweb.ru>
 * @property array subject
 */
namespace Kachit\Underscore;

class DateTime extends Entity {

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
     * @return string
     */
    protected function getType() {
        // TODO: Implement getType() method.
    }
}