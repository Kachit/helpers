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
        return $string;
    }

    /**
     * Encode
     *
     * @param $data
     * @return string
     */
    public function encode($data) {
        if (!is_array($data) || !is_object($data)) {
            return false;
        }
        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Decode
     *
     * @param string $jsonString
     * @return mixed
     */
    public function decode($jsonString) {
        return json_decode($jsonString);
    }
} 