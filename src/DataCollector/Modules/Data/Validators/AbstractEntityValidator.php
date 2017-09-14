<?php
namespace DataCollector\Modules\Data\Validators;

/**
 * Class AbstractEntityValidator
 * @package DataCollector\Modules\Data\Validators
 */
abstract class AbstractEntityValidator {

    /**
     * Error container
     *
     * @var array $errors
     */
    protected $errors;

    /**
     * Get errors
     *
     * @return array
     */
    abstract public function getErrors();

    /**
     * Is object has state?
     *
     * @return bool
     */
    abstract public function isValid();
}