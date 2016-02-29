<?php
/**
 * Array helper trait
 *
 * @author Kachit
 * @package Kachit\Helper
 */
namespace Kachit\Helper;

trait ArrayHelperTrait
{
    /**
     * @var ArrayHelper
     */
    protected $ArrayHelper;

    /**
     * Get array helper
     *
     * @return ArrayHelper
     */
    protected function getArrayHelper() {
        if(empty($this->ArrayHelper)) {
            $this->ArrayHelper = new ArrayHelper();
        }
        return $this->ArrayHelper;
    }
} 