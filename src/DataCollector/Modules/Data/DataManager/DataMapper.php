<?php
namespace DataCollector\Modules\Data\DataManager;

use DataCollector\Modules\Data\Aware\AbstractDataMapper;
use DataCollector\Modules\Data\DataManager\Exception\DataManagerException;
use DataCollector\Modules\Data\Entities\Data;

/**
 * Class DataMapper
 * @package DataCollector\Modules\Data\DataManager
 */
class DataMapper extends AbstractDataMapper {

    /**
     * @const TABLE
     */
    const TABLE = 'data';

    /**
     * Mapping data from row to object
     *
     * @param array $row
     * @throws DataManagerException
     *
     * @return Data
     */
    protected function mapRow(array $row) {

        try {
            $quiz = new Data();
            $quiz->setFromArray($row);
            return $quiz;
        } catch (\InvalidArgumentException $e) {
            throw new DataManagerException($e);
        }
    }
}