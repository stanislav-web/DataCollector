<?php
namespace DataCollector\Modules\Data\Aware;

use DataCollector\Modules\Data\Db\Exception\DbException;

/**
 * Class AbstractDatabase
 * @package DataCollector\Modules\Data\Aware
 */
abstract class AbstractDatabase {

    /**
     * @var DbAdapterInterface $db
     */
    protected $db;

    /**
     * AbstractDatabase constructor.
     *
     * @param DbAdapterInterface $db
     *
     * @throws DbException
     */
    public function __construct(DbAdapterInterface $db) {

        if(null === $this->db) {
            $this->db = $db->connect();
        }
    }

    /**
     * Fetch all rows
     *
     * @param string $query
     * @param array $params
     * @throws DbException
     *
     * @return array
     */
    abstract public function fetchAll($query, array $params = null);

    /**
     * Fetch row
     *
     * @param string $query
     * @param array    $params
     * @throws DbException
     *
     * @return array
     */
    abstract public function fetch($query, array $params);

    /**
     * Insert row query
     *
     * @param string $query
     * @param array $params
     * @throws DbException
     *
     * @return int
     */
    abstract public function insert($query, array $params);

    /**
     * Update row query
     *
     * @param string $query
     * @param array $params
     * @throws DbException
     *
     * @return bool
     */
    abstract public function update($query, array $params);

    /**
     * Delete row query
     *
     * @param string $query
     * @param array $params
     * @throws DbException
     *
     * @return bool
     */
    abstract public function delete($query, array $params);

}