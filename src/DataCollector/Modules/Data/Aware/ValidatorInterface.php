<?php
namespace DataCollector\Modules\Data\Aware;

/**
 * Interface ValidatorInterface
 * @package DataCollector\Modules\Data\Aware
 */
interface ValidatorInterface {

    /**
     * Get error message
     *
     * @return string
     */
    public function getErrorMessage();

    /**
     * Is object has valid state?
     *
     * @return bool
     */
    public function isValid();
}