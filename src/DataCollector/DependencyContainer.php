<?php
namespace DataCollector;

use DataCollector\Aware\DependencyContainerInterface;
use DataCollector\Exceptions\DependencyContainerException;

/**
 * Class DependencyContainer
 * @package DataCollector
 */
final class DependencyContainer implements DependencyContainerInterface {

    /**
     * @var \ArrayAccess $registry
     */
    private $registry;

    /**
     * Loader constructor.
     *
     * @param \ArrayAccess $registry
     */
    public function __construct(\ArrayAccess $registry) {
        $this->registry = $registry;
    }

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
    public function register($moduleName, $moduleInstance) : DependencyContainerInterface {

        $isExist = $this->registry->offsetExists($moduleName);
        if(true === $isExist) {
            throw new DependencyContainerException('Module '.$moduleName.' already registered ');
        }
        $this->registry->offsetSet($moduleName, $moduleInstance);

        return $this;
    }

    /**
     * Get module
     *
     * @param string $moduleName
     *
     * @throws DependencyContainerException
     * @return mixed
     */
    public function get($moduleName) {
        $isExist = $this->registry->offsetExists($moduleName);

        if(false === $isExist) {
            throw new DependencyContainerException('Module '.$moduleName.' does not registered ');
        }

        return $this->registry->offsetGet($moduleName);
    }
}