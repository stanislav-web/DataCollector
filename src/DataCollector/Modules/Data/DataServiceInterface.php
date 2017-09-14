<?php
namespace DataCollector\Modules\Data;

/**
 * Interface DataServiceInterface
 * @package DataCollector\Modules\Data
 */
interface DataServiceInterface {

    /**
     * Parse data from external request
     */
    public function parse(array $params);
}