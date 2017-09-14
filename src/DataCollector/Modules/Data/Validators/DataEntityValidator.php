<?php
namespace DataCollector\Modules\Data\Validators;

use DataCollector\Modules\Data\Entities\AbstractEntity;
use DataCollector\Modules\Data\Entities\Data;

/**
 * Class DataEntityValidator
 * @package DataCollector\Modules\Data\Validators
 */
class DataEntityValidator extends AbstractEntityValidator {

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
     * @return array
     */
    public function getErrors() {
        return $this->errors;
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


    private function validateCode() {
        if(false === empty($this->dataEntity->code)) {
            $this->errors['code'][] = 'Empty `code`';
        }

        return $this;
    }

    private function validateType() {
        if(false === empty($this->dataEntity->code)) {
            $this->errors['type'][] = 'Empty `type`';
        }

        return $this;
    }

    private function validateMessage() {
        if(false === empty($this->dataEntity->code)) {
            $this->errors['message'][] = 'Empty `message`';
        }

        return $this;
    }

    private function validateApplication() {

        if(false === empty($this->dataEntity->code)) {
            $this->errors['application'][] = 'Empty `application`';
        }

        return $this;
    }
}