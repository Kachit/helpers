<?php
/**
 * Helpers manager trait
 *
 * @author antoxa
 * @package Kachit
 * @subpackage Helpers
 */
namespace Kachit\Helper;

trait HelpersManagerTrait
{
    /**
     * @var ArrayHelper
     */
    private $ArrayHelper;

    /**
     * @var StringHelper
     */
    private $StringHelper;

    /**
     * Get string helper
     *
     * @return StringHelper
     */
    protected function getStringHelper() {
        if(empty($this->StringHelper)) {
            $this->StringHelper = new StringHelper();
        }
        return $this->StringHelper;
    }

    /**
     * Get array helper
     *
     * @return ArrayHelper
     */
    public function getArrayHelper() {
        if(empty($this->ArrayHelper)) {
            $this->ArrayHelper = new ArrayHelper();
        }
        return $this->ArrayHelper;
    }
}
