<?php
/**
 * Helper for works with json serializes
 *
 * @author Kachit
 * @package Kachit\Helper
 */
namespace Kachit\Helper;

class JsonHelper {

    /**
     * @var bool
     */
    protected $isPhp54 = false;

    /**
     * @var bool
     */
    protected $isPhp55 = false;

    /**
     * @var array
     */
	protected $optionsDecode = [
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
     * @var array
     */
	protected $optionsEncode = [
		JSON_HEX_TAG => false,
		JSON_HEX_AMP => false,
		JSON_HEX_APOS => false,
		JSON_HEX_QUOT => false,
		JSON_FORCE_OBJECT => false,
		JSON_NUMERIC_CHECK => false,
		JSON_BIGINT_AS_STRING => false,
		JSON_PRETTY_PRINT => false,
		JSON_UNESCAPED_SLASHES => false,
		JSON_UNESCAPED_UNICODE => false,
	];

    /**
     * Init
     */
	public function __construct() {
        $this->isPhp54 = $this->phpVersionCompare('5.4.0');
        $this->isPhp55 = $this->phpVersionCompare('5.5.0');
		$this->initDecodeOptions();
		$this->initEncodeOptions();
	}

    /**
     * Decode json string to value
     *
     * @param $jsonString
     * @return mixed
     */
	public function decode($jsonString) {
		return json_decode($jsonString, $this->decodeAsArray, $this->decodeDepth, $this->getDecodeOptions());
	}

    /**
     * Encode value to json string
     *
     * @param $value
     * @return string
     */
	public function encode($value) {
		return json_encode($value, $this->getEncodeOptions());
	}

    /**
     * Get decode options
     *
     * @return int
     */
	protected function getDecodeOptions() {
		$options = 0;
		return $options;
	}

    /**
     * Get encode options
     *
     * @return int
     */
	protected function getEncodeOptions() {
		$options = 0;
		return $options;
	}

    /**
     * initDecodeOptions
     *
     * @return void
     */
	protected function initDecodeOptions() {
		$options = [
			JSON_BIGINT_AS_STRING => false,
		];
		$this->optionsDecode = $options;
	}

    /**
     * initEncodeOptions
     *
     * @return void
     */
	protected function initEncodeOptions() {
		$options = [
			JSON_HEX_TAG => false,
			JSON_HEX_AMP => false,
			JSON_HEX_APOS => false,
			JSON_HEX_QUOT => false,
			JSON_FORCE_OBJECT => false,
			JSON_NUMERIC_CHECK => false,
		];
		$this->optionsEncode = $options;
	}

    /**
     * setNeedJsonHexTag
     *
     * @param bool $value
     * @return $this
     */
	public function setNeedJsonHexTag($value = true) {
		return $this->setEncodeValue(JSON_HEX_TAG, $value);
	}

    /**
     * Set encode value
     *
     * @param int $optionKey
     * @param bool $value
     * @return $this
     */
	protected function setEncodeValue($optionKey, $value) {
		$this->optionsEncode[$optionKey] = (bool)$value;
		return $this;
	}

    /**
     * Set decode value
     *
     * @param int $optionKey
     * @param bool $value
     * @return $this
     */
    protected function setDecodeValue($optionKey, $value) {
        $this->optionsDecode[$optionKey] = (bool)$value;
        return $this;
    }

    /**
     * Php version compare
     *
     * @param string $version
     * @return bool
     */
    protected function phpVersionCompare($version) {
        return version_compare(PHP_VERSION, $version) >= 0;
    }

    /**
     * Set decode as array
     *
     * @return $this;
     */
    public function setDecodeAsArray() {
        $this->decodeAsArray = true;
        return $this;
    }

    /**
     * Set decode as object
     *
     * @return $this;
     */
    public function setDecodeAsObject() {
        $this->decodeAsArray = false;
        return $this;
    }

    /**
     * Set decode depth
     *
     * @param int $decodeDepth
     * @return $this;
     */
    public function setDecodeDepth($decodeDepth) {
        $this->decodeDepth = (int)$decodeDepth;
        return $this;
    }
}
?>