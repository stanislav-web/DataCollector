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
     * Find rows
     *
     * @throws DataManagerException
     * @return int
     * @throws \DataCollector\Modules\Data\Db\Exception\DbException
     */
    public function countRows( ) {

        $query = 'SELECT COUNT(`id`) as `count`
                    FROM ' .self::TABLE;

        $result = $this->db->fetch($query, []);

        if (null === $result) {
            throw new DataManagerException('Calculate rows does not executed');
        }
        return (int)$result['count'];
    }


    /**
     * Find rows
     *
     * @param string $order
     * @param string $condition
     * @param int    $limit
     * @param int    $offset
     *
     * @return array
     * @throws \DataCollector\Modules\Data\Db\Exception\DbException
     * @throws DataManagerException
     */
    public function findRows(   $order = 'id',
                                $condition = 'ASC',
                                $limit = 10,
                                $offset = 0
                            ) {

        $query = 'SELECT `id`, `code`, `type`, `status`, `application`,
                         `message`, `date_create`, `date_update`
                    FROM ' .self::TABLE.'
                    ORDER BY :order :condition LIMIT :offset, :limit';

        $escapedQuery = strtr($query, [
                ':order' => $this->db->escape($order),
                ':condition' => $this->db->escape($condition),
                ':limit' => abs($this->db->escape($limit)),
                ':offset' => abs($this->db->escape($offset)),
            ]
        );

        $result = $this->db->fetchAll($escapedQuery);

        if (null === $result) {
            throw new DataManagerException('Rows are not available');
        }
        return $this->mapRows($result);
    }

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
     * Update row
     *
     * @param int $id
     * @param string $status
     *
     * @throws DataManagerException
     * @return bool
     */
    public function updateStatusRow($id, $status) {
        try {
            $query = 'UPDATE ' .self::TABLE. '
                        SET `status` = :status
                         WHERE `id` = :id';

            return $this->db->update($query, ['id' => $id, 'status' => $status]);
        } catch (DbException $e) {
            throw new DataManagerException('Status #'.$id.' doesn not updated');
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