<?php
/**
 * Json helper
 *
 * @author Kachit
 * @package Kachit\Helper
 */
namespace Kachit\Helper;

class JsonHelper {

    /**
     * Validate json
     *
     * @param $string
     * @return bool
     */
    public function isValidJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    /**
     * encode
     *
     * @param $value
     * @return string
     */
    public function encode($value) {
        return json_encode($value);
    }

    /**
     * decode
     *
     * @param $jsonString
     * @return mixed
     */
    public function decode($jsonString) {
        return json_decode($jsonString);
    }
} 