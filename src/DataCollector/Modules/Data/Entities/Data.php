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
     * String
     *
     * @var string $status
     */
    public $status;


    /**
     * Application
     *
     * @var string $application
     */
    public $application;

    /**
     * Message
     *
     * @var string $message
     */
    public $message;

    /**
     * Date create
     *
     * @var string $date_create
     */
    public $date_create;


    /**
     * Date update
     *
     * @var string $date_update
     */
    public $date_update;
}