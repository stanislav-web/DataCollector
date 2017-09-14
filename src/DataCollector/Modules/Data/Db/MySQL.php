<?php
namespace DataCollector\Modules\Data\Db;

use DataCollector\Modules\Data\Aware\DbAdapterInterface;
use DataCollector\Modules\Data\Db\Exception\DbException;

/**
 * Class MySQL
 * @package DataCollector\Modules\Data\Db
 */
class MySQL implements DbAdapterInterface {

    /**
     * @var \stdClass $config
     */
    private $config;

    /**
     * @var \PDO
     */
    private $connection;

    /**
     * MySQL constructor.
     *
     * @param \stdClass $config
     */
    public function __construct(\stdClass $config) {

        $this->config['username'] = $config->username;
        $this->config['password'] = $config->password;
        $this->config['charset'] = $config->charset;
        $this->config['debug'] = $config->debug;
        $this->config['dsn'] = vsprintf('mysql:dbname=%s;host=%s;port=%d', [
            $config->dbname,
            $config->host,
            $config->port,
        ]);
    }

    /**
     * Connect to service
     *
     * @throws DbException
     * @return \PDO
     */
    public function connect() {

        if(null === $this->connection) {

            try {
                $this->connection = new \PDO($this->config['dsn'], $this->config['username'], $this->config['password'], [
                    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES '".$this->config['charset']."'",
                    \PDO::ATTR_CASE => \PDO::CASE_LOWER,
                    \PDO::ATTR_ERRMODE => $this->config['debug'],
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                ]);
            } catch (\PDOException $e) {
                throw new DbException($e);
            }
        }

        return $this->connection;
    }

    /**
     * Disconnect from service
     *
     * @throws DbException
     * @return bool
     */
    public function disconnect() {

        if(null === $this->connection) {
            throw new DbException('Connection already closed!');
        }

        $this->connection = null;

        return true;
    }
}