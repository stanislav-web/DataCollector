<?php
namespace DataCollector\Modules\Data;

use DataCollector\Modules\Data\DataManager\DataMapper;

/**
 * Class Module
 * @package DataCollector\Modules\Data
 */
class Module implements ModuleInterface {

    /**
     * Default storage driver
     */
    const DB_DRIVER = Db\MySQL::class;

    /**
     * @var DataService $dataService
     */
    private $dataService;

    /**
     * Get module config
     *
     * @return \stdClass
     */
    public function getConfig() {
        return (object)include __DIR__ . DS.'config'.DS.'module.config.php';
    }

    /**
     * Get "lazy" module service
     *
     * @throws \ReflectionException
     * @throws \DataCollector\Modules\Data\Db\Exception\DbException
     * @throws DataException
     * @return DataServiceInterface
     */
    public function getService() {

        if(null === $this->dataService) {

            $dbReflectionClass = new \ReflectionClass(self::DB_DRIVER);
            $dbConfig = (object)$this->getConfig()->db;
            $dbAdapter = $dbReflectionClass->newInstanceArgs([$dbConfig]);
            /** @noinspection PhpParamsInspection */
            $dbInstance = new DbClient($dbAdapter);

            $dataMapper = new DataMapper($dbInstance);
            $this->dataService = new DataService( $dataMapper );
        }

        return $this->dataService;
    }
}