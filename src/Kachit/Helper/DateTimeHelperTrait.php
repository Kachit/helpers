<?php
/**
 * DateTime helper trait
 *
 * @author Kachit
 * @package Kachit\Helper
 */
namespace Kachit\Helper;

trait DateTimeHelperTrait
{
    /**
     * @var StringHelper
     */
    protected $DateTimeHelper;

    /**
     * Get date time helper
     *
     * @return DateTimeHelper
     */
    protected function getDateTimeHelper()
    {
        if(empty($this->DateTimeHelper)) {
            $this->DateTimeHelper = new DateTimeHelper();
        }
        return $this->DateTimeHelper;
    }
} 