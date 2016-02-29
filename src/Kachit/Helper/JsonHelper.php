<?php
/**
 * Helper for works with json serializes
 *
 * @author Kachit
 * @package Kachit\Helper
 */
namespace Kachit\Helper;

use Kachit\Helper\Json\Encoder;
use Kachit\Helper\Json\Decoder;

class JsonHelper
{
    /**
     * @var Decoder
     */
    protected $decoder;

    /**
     * @var Encoder
     */
    protected $encoder;

    /**
     * Get decoder
     *
     * @return Decoder
     */
    public function getDecoder()
    {
        if (empty($this->decoder)) {
            $this->decoder = new Decoder();
        }
        return $this->decoder;
    }

    /**
     * Get encoder
     *
     * @return Encoder
     */
    public function getEncoder()
    {
        if (empty($this->encoder)) {
            $this->encoder = new Encoder();
        }
        return $this->encoder;
    }

    /**
     * Encode value to json string
     *
     * @param mixed $value
     * @return string
     */
    public function encode($value)
    {
        return $this->getEncoder()->encode($value);
    }

    /**
     * Decode json string to value
     *
     * @param string $jsonString
     * @return mixed
     */
    public function decode($jsonString)
    {
        return $this->getDecoder()->decode($jsonString);
    }
}