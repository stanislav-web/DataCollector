<?php
namespace DataCollector\Modules\Data\Validators;

use DataCollector\Modules\Data\Aware\ValidatorInterface;
use DataCollector\Modules\Data\Entities\AbstractEntity;
use DataCollector\Modules\Data\Entities\Data;

/**
 * Class DataEntityValidator
 * @package DataCollector\Modules\Data\Validators
 */
class DataEntityValidator implements ValidatorInterface {

    /**
     * Validations rules
     *
     * @const RULES
     */
    const RULES = [
        'code' => [
            'minlength' => 1,
            'maxlength' => 3,
        ],
        'type' => [
            'minlength' => 1,
            'maxlength' => 1,
        ],
        'application' => [
            'minlength' => 1,
            'maxlength' => 20
        ],
        'message' => [
            'minlength' => 1,
            'maxlength' => 1000
        ]
    ];

    /**
     * @var array $errors
     */
    private $errors;

    /**
     * @var AbstractEntity $dataEntity
     */
    private $dataEntity;

    /**
     * DataEntityValidator constructor.
     *
     * @param AbstractEntity|Data $dataEntity
     */
    public function __construct(AbstractEntity $dataEntity) {
        $this->dataEntity = $dataEntity;
    }

    /**
     * Get errors
     *
     * @return string
     */
    public function getErrorMessage() {
        return implode('<br>', $this->errors);
    }

    /**
     * Is valid
     * @return bool
     */
    public function isValid() {
        $this->validateType()
            ->validateCode()
            ->validateMessage()
            ->validateApplication();

        return count($this->errors) === 0;
    }

    /**
     * Validate code
     *
     * @return DataEntityValidator
     */
    private function validateCode() {

        if(true === empty($this->dataEntity->code)) {
            $this->errors['code'] = 'Empty `code`';
        }

        if(mb_strlen($this->dataEntity->code) < self::RULES['code']['minlength']) {
            $this->errors['code'] = '`code` data is too small';
        }
        if(mb_strlen($this->dataEntity->code) > self::RULES['code']['maxlength']) {
            $this->errors['code'] = '`code` data is too long';
        }

        return $this;
    }

    /**
     * Validate type
     *
     * @return DataEntityValidator
     */
    private function validateType() {

        if(true === empty($this->dataEntity->type)) {
            $this->errors['type'] = 'Empty `type`';
        }

        if(mb_strlen($this->dataEntity->type) < self::RULES['type']['minlength']) {
            $this->errors['type'] = '`type` data is too small';
        }
        if(mb_strlen($this->dataEntity->type) > self::RULES['type']['maxlength']) {
            $this->errors['type'] = '`type` data is too long';
        }

        return $this;
    }

    /**
     * Validate message
     *
     * @return DataEntityValidator
     */
    private function validateMessage() {

        if(true === empty($this->dataEntity->message)) {
            $this->errors['message'] = 'Empty `message`';
        }

        if(mb_strlen($this->dataEntity->message) < self::RULES['message']['minlength']) {
            $this->errors['message'] = '`message` data is too small';
        }
        if(mb_strlen($this->dataEntity->message) > self::RULES['message']['maxlength']) {
            $this->errors['message'] = '`message` data is too long';
        }

        return $this;
    }

    /**
     * Validate application
     *
     * @return DataEntityValidator
     */
    private function validateApplication() {

        if(true === empty($this->dataEntity->application)) {
            $this->errors['application'] = 'Empty `application`';
        }

        if(mb_strlen($this->dataEntity->application) < self::RULES['application']['minlength']) {
            $this->errors['message'] = '`application` data is too small';
        }

        if(mb_strlen($this->dataEntity->application) > self::RULES['application']['maxlength']) {
            $this->errors['message'] = '`application` data is too long';
        }

        return $this;
    }
}