<?php
namespace DataCollector\Modules\Data\DataManager;

use DataCollector\Modules\Data\Aware\AbstractDataMapper;
use DataCollector\Modules\Data\DataManager\Exception\DataManagerException;
use DataCollector\Modules\Data\Db\Exception\DbException;
use DataCollector\Modules\Data\Entities\AbstractEntity;
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
     * Add entity
     *
     * @param AbstractEntity|Data $entity
     *
     * @throws DataManagerException
     * @return int
     */
    public function addEntity(AbstractEntity $entity) {

        try {
            $query = 'INSERT INTO  ' .self::TABLE. ' (`code`,`type`,`application`,`message`) VALUES (
                        :code, 
                        :type,
                        :application,
                        :message
                    )';
            $rowId = $this->db->insert($query, [
                'code'          => $entity->code,
                'type'          => $entity->type,
                'application'   => $entity->application,
                'message'       => $entity->message,
            ]);

            return $rowId;

        } catch (DbException $e) {
            throw new DataManagerException('Record was not created');
        }
    }

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
            return new Data($row);
        } catch (\InvalidArgumentException $e) {
            throw new DataManagerException($e);
        }
    }
}