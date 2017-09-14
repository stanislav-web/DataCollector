<?php
namespace DataCollector\Modules\Data;

use DataCollector\Modules\Data\Aware\AbstractDatabase;
use DataCollector\Modules\Data\Db\Exception\DbException;

/**
 * Class DbClient
 * @package DataCollector\Modules\Data
 */
class DbClient extends AbstractDatabase {

    /**
     * Fetch all rows
     *
     * @param string $query
     * @param array $params
     * @throws DbException
     *
     * @return array
     */
    public function fetchAll($query, array $params = null) {

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
            $result = $stmt->fetchAll();
            return $result ?: [];

        } catch (\PDOException $e) {
            throw new DbException($e);
        }

    }

    /**
     * Fetch row
     *
     * @param string $query
     * @param array    $params
     * @throws DbException
     *
     * @return array
     */
    public function fetch($query, array $params) {

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
            $result = $stmt->fetch();
            return $result ?: [];

        } catch (\PDOException $e) {
            throw new DbException($e);
        }
    }

    /**
     * Insert row query
     *
     * @param string $query
     * @param array $params
     * @throws DbException
     *
     * @return int
     */
    public function insert($query, array $params) {

        try {

            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
            return $this->db->lastInsertId();

        } catch (\PDOException $e) {
            throw new DbException($e);
        }
    }

    /**
     * Update row query
     *
     * @param string $query
     * @param array $params
     * @throws DbException
     *
     * @return bool
     */
    public function update($query, array $params) {

        try {

            $stmt = $this->db->prepare($query);
            return $stmt->execute($params);

        } catch (\PDOException $e) {
            throw new DbException($e);
        }
    }

    /**
     * Delete row query
     *
     * @param string $query
     * @param array $params
     * @throws DbException
     *
     * @return bool
     */
    public function delete($query, array $params) {

        try {

            $stmt = $this->db->prepare($query);
            return $stmt->execute($params);

        } catch (\PDOException $e) {
            throw new DbException($e);
        }
    }

}