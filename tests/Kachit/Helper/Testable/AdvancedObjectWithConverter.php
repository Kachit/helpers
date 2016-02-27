<?php
/**
 * ObjectWithConverter
 *
 * @author antoxa <kornilov@realweb.ru>
 * @package Kachit\Helper\Testable
 */
namespace Kachit\Helper\Testable;

class AdvancedObjectWithConverter extends ObjectWithConverter
{
    /**
     * @var ObjectWithConverter
     */
    protected $friend;

    /**
     * @var
     */
    protected $fieldForExclude;

    /**
     * Init
     */
    public function __construct()
    {
        $this->friend = new ObjectWithConverter();
    }

    /**
     * Get friend
     *
     * @return ObjectWithConverter
     */
    public function getFriend()
    {
        return $this->friend;
    }

    /**
     * @return array
     */
    protected function getObjectConverterExcludeFields()
    {
        return ['fieldForExclude'];
    }

    /**
     * @param mixed $value
     * @return bool
     */
    public function checkClassParamIsObjectConverter($value)
    {
        return parent::checkClassParamIsObjectConverter($value);
    }
} 