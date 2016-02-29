<?php
/**
 * String helper trait
 *
 * @author Kachit
 * @package Kachit\Helper
 */
namespace Kachit\Helper;

trait StringHelperTrait
{
    /**
     * @var StringHelper
     */
    protected $StringHelper;

    /**
     * Get string helper
     *
     * @return StringHelper
     */
    protected function getStringHelper()
    {
        if(empty($this->StringHelper)) {
            $this->StringHelper = new StringHelper();
        }
        return $this->StringHelper;
    }
} 