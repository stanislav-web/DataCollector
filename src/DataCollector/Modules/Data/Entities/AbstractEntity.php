<?php
namespace DataCollector\Modules\Data\Entities;

/**
 * Class AbstractEntity
 * @package DataCollector\Modules\Data\Entities
 */
abstract class AbstractEntity {

    /**
     * AbstractEntity constructor.
     *
     * @param array $param
     */
    public function __construct(array $param) {
        $this->setFromArray($param);
    }

    /**
     * @param string $property
     *
     * @throws \InvalidArgumentException
     */
    public function __get($property) {
        throw new \InvalidArgumentException($property.' does not exist');
    }

    /**
     * @param string $property
     *
     * @throws \InvalidArgumentException
     */
    public function __isset($property) {
        throw new \InvalidArgumentException($property.' does not exist');
    }

    /**
     * @param string $property
     * @param mixed  $value
     *
     * @throws \InvalidArgumentException
     */
    public function __set($property, $value) {
        throw new \InvalidArgumentException($property.' property does not support');
    }

    /**
     * Fill object property from array
     *
     * @param array $data
     *
     * @return AbstractEntity
     */
    public function setFromArray($data) {

        foreach ($data as $property => $value) {
            $this->$property = (true === is_numeric($value)) ? (int)$value : trim($value);
        }
        return $this;
    }
}