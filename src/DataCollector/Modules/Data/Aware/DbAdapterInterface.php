<?php
namespace DataCollector\Modules\Data\Aware;

use DataCollector\Modules\Data\Db\Exception\DbException;

/**
 * Interface DbAdapterInterface
 * @package DataCollector\Modules\Data\Aware
 */
interface DbAdapterInterface {

    /**
     * Connect to service
     *
     * @throws DbException
     * @return \PDO
     */
    public function connect();

    /**
     * Disconnect from service
     *
     * @throws DbException
     * @return bool
     */
    public function disconnect();

}