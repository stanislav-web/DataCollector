<?php
namespace DataCollector\Modules\Data\Entities;

/**
 * Class Data
 * @package DataCollector\Modules\Data\Entities
 */
class Data extends AbstractEntity {

    /**
     * Data id
     *
     * @var int $id
     */
    public $id;

    /**
     * Code
     *
     * @var int $code
     */
    public $code;

    /**
     * Type
     *
     * @var int $type
     */
    public $type;

    /**
     * Message
     *
     * @var string $message
     */
    public $message;

    /**
     * Application
     *
     * @var string $application
     */
    public $application;
}