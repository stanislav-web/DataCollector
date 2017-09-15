<?php
namespace DataCollector\Modules\Data\Aware;

use DataCollector\Modules\Data\Entities\AbstractEntity;
use DataCollector\Modules\Data\DataManager\Exception\DataManagerException;

/**
 * Class AbstractDataMapper
 * @package DataCollector\Modules\Data\Aware
 */
abstract class AbstractDataMapper {

    /**
     * @var AbstractDatabase $db
     */
    protected $db;

    /**
     * AbstractDataMapper constructor.
     *
     * @param  $db
     */
    public function __construct(AbstractDatabase $db) {
        $this->db = $db;
    }

    /**
     * Mapping data from row to object
     *
     * @param array $row
     * @throws DataManagerException
     *
     * @return AbstractEntity
     */
    abstract protected function mapRow(array $row);

    /**
     * Mapping data from rows to object
     *
     * @param array $rows
     * @throws DataManagerException
     *
     * @return array
     */
    protected function mapRows(array $rows) {

        $result = [];

        try {
            foreach($rows as $row) {
                $result[] = $this->mapRow($row);
            }
            return $result;

        } catch (\InvalidArgumentException $e) {
            throw new DataManagerException($e);
        }
    }
}