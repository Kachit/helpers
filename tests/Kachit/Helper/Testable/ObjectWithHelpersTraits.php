<?php
/**
 * ObjectWithHelpersManager
 *
 * @author antoxa <kornilov@realweb.ru>
 * @package Kachit\Helper\Testable
 */
namespace Kachit\Helper\Testable;

use Kachit\Helper\ArrayHelperTrait;
use Kachit\Helper\ArrayHelper;
use Kachit\Helper\DateTimeHelperTrait;
use Kachit\Helper\DateTimeHelper;
use Kachit\Helper\StringHelperTrait;
use Kachit\Helper\StringHelper;
use Kachit\Helper\JsonHelperTrait;
use Kachit\Helper\JsonHelper;

class ObjectWithHelpersTraits
{

    use ArrayHelperTrait {
        getArrayHelper as fetchArrayHelper;
    }
    use StringHelperTrait {
        getStringHelper as fetchStringHelper;
    }
    use DateTimeHelperTrait {
        getDateTimeHelper as fetchDateTimeHelper;
    }
    use JsonHelperTrait {
        getJsonHelper as fetchJsonHelper;
    }

    /**
     * Get array helper
     *
     * @return ArrayHelper
     */
    public function getArrayHelper()
    {
        return $this->fetchArrayHelper();
    }

    /**
     * Get string helper
     *
     * @return StringHelper
     */
    public function getStringHelper()
    {
        return $this->fetchStringHelper();
    }

    /**
     * Get DateTime helper
     *
     * @return DateTimeHelper
     */
    public function getDateTimeHelper()
    {
        return $this->fetchDateTimeHelper();
    }

    /**
     * Get DateTime helper
     *
     * @return JsonHelper
     */
    public function getJsonHelper()
    {
        return $this->fetchJsonHelper();
    }
}