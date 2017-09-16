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
     * @param array $request
     * @throws DataException
     *
     * @return array
     */
    public function fetchData(array $request);

    /**
     * Save data via data manager
     *
     * @param string $inputString
     * @throws DataException
     *
     * @return int
     */
    public function saveData($inputString);

    /**
     * Update data via data manager
     *
     * @param array $request
     * @throws DataException
     *
     * @return bool
     */
    public function updateData(array $request);
}