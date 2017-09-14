<?php
namespace  DataCollector\Modules\Data;

/**
 * Interface ModuleInterface
 * @package DataCollector\Modules\Data
 */
interface ModuleInterface {

    /**
     * Get module config
     *
     * @return \stdClass
     */
    public function getConfig();

    /**
     * Get "lazy" module sevice
     *
     * @throws DataException
     *
     * @return DataService
     */
    public function getService();
}