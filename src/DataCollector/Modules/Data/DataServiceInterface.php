<?php
namespace DataCollector\Modules\Data;

/**
 * Interface DataServiceInterface
 * @package DataCollector\Modules\Data
 */
interface DataServiceInterface {

    /**
     * Fetch data via DataManager
     *
     * @param array $param
     * @throws DataException
     *
     * @return array
     */
    public function fetchData(array $param);

    /**
     * Save data via data manager
     *
     * @param string $inputString
     * @throws DataException
     *
     * @return int
     */
    public function saveData($inputString);
}