<?php
/**
 * Decoder
 *
 * @author Kachit
 */
namespace Kachit\Helper\Json;

class Decoder extends AbstractJson {

    /**
     * @var array
     */
    protected $options = [
        JSON_BIGINT_AS_STRING => false,
    ];

    /**
     * @var bool
     */
    protected $decodeAsArray = true;

    /**
     * @var int
     */
    protected $decodeDepth = 512;

    /**
     * Decode json string to value
     *
     * @param string $jsonString
     * @return mixed
     */
    public function decode($jsonString)
    {
        $value = json_decode($jsonString, $this->decodeAsArray, $this->decodeDepth, $this->generateOptions());
        $this->checkJsonErrors();
        return $value;
    }

    /**
     * Set decode as array
     *
     * @return $this;
     */
    public function setDecodeAsArray()
    {
        $this->decodeAsArray = true;
        return $this;
    }

    /**
     * Set decode as object
     *
     * @return $this;
     */
    public function setDecodeAsObject()
    {
        $this->decodeAsArray = false;
        return $this;
    }

    /**
     * Set decode depth
     *
     * @param int $decodeDepth
     * @return $this;
     */
    public function setDecodeDepth($decodeDepth)
    {
        $this->decodeDepth = (int)$decodeDepth;
        return $this;
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
}