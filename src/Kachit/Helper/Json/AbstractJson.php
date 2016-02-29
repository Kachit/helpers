<?php
/**
 * AbstractJson
 *
 * @author Kachit
 * @package Kachit\Helper\Json
 */
namespace Kachit\Helper\Json;

class AbstractJson
{
    /**
     * @var array
     */
    protected $options = [];

    /**
     * Set encode value
     *
     * @param int $key
     * @param bool $value
     * @return $this
     */
    protected function setOption($key, $value)
    {
        if (array_key_exists($key, $this->options)) {
            $this->options[$key] = (bool)$value;
        }
        return $this;
    }

    /**
     * Generate options list
     *
     * @return int
     */
    protected function generateOptions()
    {
        $options = 0;
        foreach ($this->options as $option => $state) {
            if ($state) {
                $options = $options | $option;
            }
        }
        return $options;
    }

    /**
     * Check json encoding errors
     *
     * @throws \Exception
     */
    protected function checkJsonErrors()
    {
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception(json_last_error_msg());
        }
    }

    /**
     * Clear options
     *
     * @return $this
     */
    public function clearOptions()
    {
        $this->options = [];
        return $this;
    }

    /**
     * Set options
     *
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options)
    {
        foreach ($options as $key) {
            $this->setOption($key, true);
        }
        return $this;
    }
}