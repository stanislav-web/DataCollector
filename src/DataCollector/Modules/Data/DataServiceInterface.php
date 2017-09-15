<?php
namespace DataCollector\Modules\Data;

/**
 * Interface DataServiceInterface
 * @package DataCollector\Modules\Data
 */
interface DataServiceInterface {

    /**
     * Save data via data manager
     *
     * @param string $inputString
     * @throws DataException
     *
     * @return int
     */
    public function save($inputString);
}