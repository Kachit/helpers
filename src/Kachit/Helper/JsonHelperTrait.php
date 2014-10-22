<?php
/**
 * Json helper trait
 *
 * @author Kachit
 * @package Kachit\Helper
 */
namespace Kachit\Helper;

trait JsonHelperTrait {

    /**
     * @var JsonHelper
     */
    protected $JsonHelper;

    /**
     * Get json helper
     *
     * @return JsonHelper
     */
    protected function getJsonHelper() {
        if(empty($this->JsonHelper)) {
            $this->JsonHelper = new JsonHelper();
        }
        return $this->JsonHelper;
    }
} 