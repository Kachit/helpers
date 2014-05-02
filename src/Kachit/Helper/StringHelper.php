<?php
/**
 * String helper
 *
 * @author Kachit
 * @package Kachit\Helper
 */
namespace Kachit\Helper;

class StringHelper {

    /**
     * Convert string to camelCase
     *
     * @param string $string
     * @param bool $lcfirst
     * @return string
     */
    public function convertToCamelCase($string, $lcfirst = true) {
        $string = str_replace(' ', '', ucwords(strtolower(preg_replace('/[-_]/', ' ', $string))));
        return ($lcfirst) ? lcfirst($string) : $string;
    }

    /**
     * Convert string to under_score
     *
     * @param string $word
     * @return string
     */
    public function convertToUnderscore($word) {
        $word = trim($word);
        $word = preg_replace('/[^a-zA-Z0-9\-\_\s]/', '', $word);
        $word = preg_replace('/[\_\s\-]+/', '_', $word);
        $word = preg_replace('/([a-z])([A-Z])/', '\\1_\\2', $word);
        $word = strtolower($word);
        return $word;
    }
}