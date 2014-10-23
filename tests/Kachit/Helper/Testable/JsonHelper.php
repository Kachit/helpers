<?php
/**
 * JsonHelper
 *
 * @author Kachit
 */
namespace Kachit\Helper\Testable;

use Kachit\Helper\JsonHelper as BaseJsonHelper;

class JsonHelper extends BaseJsonHelper {

    /**
     * Get decode options
     *
     * @return int
     */
    public function generateDecodeOptions() {
        return parent::generateDecodeOptions();
    }

    /**
     * Generate options list
     *
     * @param array $optionsList
     * @return int
     */
    public function generateOptions(array $optionsList) {
        return parent::generateOptions($optionsList);
    }

    /**
     * Get encode options
     *
     * @return int
     */
    public function generateEncodeOptions() {
        return parent::generateEncodeOptions();
    }

    /**
     * Get decode options
     *
     * @return array
     */
    public function getDecodeOptions() {
        return parent::getDecodeOptions();
    }

    /**
     * Get encode options
     *
     * @return array
     */
    public function getEncodeOptions() {
        return parent::getEncodeOptions();
    }

    /**
     * Php version compare
     *
     * @param string $version
     * @return bool
     */
    public function phpVersionCompare($version) {
        return parent::phpVersionCompare($version);
    }
} 