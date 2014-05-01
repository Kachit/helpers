<?php
/**
 * Helpers manager trait
 *
 * @author Kachit
 * @package Kachit\Helper
 */
namespace Kachit\Helper;

trait HelpersManagerTrait {

    /**
     * @var ArrayHelper
     */
    protected $ArrayHelper;

    /**
     * @var StringHelper
     */
    protected $StringHelper;

    /**
     * @var StringHelper
     */
    protected $DateTimeHelper;

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
    protected function getArrayHelper() {
        if(empty($this->ArrayHelper)) {
            $this->ArrayHelper = new ArrayHelper();
        }
        return $this->ArrayHelper;
    }

    /**
     * Get date time helper
     *
     * @return DateTimeHelper
     */
    protected function getDateTimeHelper() {
        if(empty($this->DateTimeHelper)) {
            $this->DateTimeHelper = new DateTimeHelper();
        }
        return $this->DateTimeHelper;
    }
}
