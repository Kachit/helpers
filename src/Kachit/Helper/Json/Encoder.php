<?php
/**
 * Encoder
 *
 * @author Kachit
 */
namespace Kachit\Helper\Json;

class Encoder extends AbstractJson
{
    /**
     * @var array
     */
    protected $options = [
        JSON_HEX_TAG => false,
        JSON_HEX_AMP => false,
        JSON_HEX_APOS => false,
        JSON_HEX_QUOT => false,
        JSON_FORCE_OBJECT => false,
        JSON_NUMERIC_CHECK => false,
        //php 5.4 support
        JSON_BIGINT_AS_STRING => false,
        JSON_PRETTY_PRINT => false,
        JSON_UNESCAPED_SLASHES => true,
        JSON_UNESCAPED_UNICODE => true,
    ];

    /**
     * Encode value to json string
     *
     * @param mixed $value
     * @return string
     */
    public function encode($value)
    {
        $value = $this->prepareValueForEncode($value);
        $jsonString = json_encode($value, $this->generateOptions());
        $this->checkJsonErrors();
        return $jsonString;
    }

    /**
     * Set encode option JSON_HEX_TAG
     *
     * @param bool $value
     * @return $this
     */
    public function enableHexTag($value = true)
    {
        return $this->setOption(JSON_HEX_TAG, $value);
    }

    /**
     * Set encode option JSON_PRETTY_PRINT
     *
     * @param bool $value
     * @return $this
     */
    public function enablePrettyPrint($value = true)
    {
        return $this->setOption(JSON_PRETTY_PRINT, $value);
    }

    /**
     * Set encode option JSON_BIGINT_AS_STRING
     *
     * @param bool $value
     * @return $this
     */
    public function enableBigIntAsString($value = true)
    {
        return $this->setOption(JSON_BIGINT_AS_STRING, $value);
    }

    /**
     * Set encode option JSON_UNESCAPED_SLASHES
     *
     * @param bool $value
     * @return $this
     */
    public function enableUnescapedSlashes($value = true)
    {
        return $this->setOption(JSON_UNESCAPED_SLASHES, $value);
    }

    /**
     * Set encode option JSON_UNESCAPED_UNICODE
     *
     * @param bool $value
     * @return $this
     */
    public function enableUnescapedUnicode($value = true)
    {
        return $this->setOption(JSON_UNESCAPED_UNICODE, $value);
    }

    /**
     * Set encode option JSON_HEX_AMP
     *
     * @param bool $value
     * @return $this
     */
    public function enableHexAmp($value = true)
    {
        return $this->setOption(JSON_HEX_AMP, $value);
    }

    /**
     * Set encode option JSON_HEX_APOS
     *
     * @param bool $value
     * @return $this
     */
    public function enableHexApos($value = true)
    {
        return $this->setOption(JSON_HEX_APOS, $value);
    }

    /**
     * Set encode option JSON_HEX_QUOT
     *
     * @param bool $value
     * @return $this
     */
    public function enableHexQuot($value = true)
    {
        return $this->setOption(JSON_HEX_QUOT, $value);
    }

    /**
     * Set encode option JSON_FORCE_OBJECT
     *
     * @param bool $value
     * @return $this
     */
    public function enableForceObject($value = true)
    {
        return $this->setOption(JSON_FORCE_OBJECT, $value);
    }

    /**
     * Set encode option JSON_NUMERIC_CHECK
     *
     * @param bool $value
     * @return $this
     */
    public function enableNumericCheck($value = true)
    {
        return $this->setOption(JSON_NUMERIC_CHECK, $value);
    }

    /**
     * Prepare value for encode
     *
     * @param mixed $value
     * @return array
     */
    protected function prepareValueForEncode($value)
    {
        if (!is_array($value) || !is_object($value)) {
            $value = (array)$value;
        }
        return $value;
    }
}