<?php
namespace DataCollector\Aware;

use DataCollector\Exceptions\DependencyContainerException;

/**
 * Interface DependencyContainerInterface
 * @package DataCollector\Aware
 */
interface DependencyContainerInterface {

    /**
     * Set module
     *
     * @param string                $moduleName
     * @param mixed                $moduleInstance
     *
     * @throws DependencyContainerException
     *
     * @return DependencyContainerInterface
     */
    public function register($moduleName, $moduleInstance);

    /**
     * Get module
     *
     * @param string $moduleName
     *
     * @throws DependencyContainerException
     * @return mixed
     */
    public function get($moduleName);
}