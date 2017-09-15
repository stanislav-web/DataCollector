<?php
namespace DataCollector\Modules\Data\Validators;

use DataCollector\Modules\Data\Aware\ValidatorInterface;

/**
 * Class JsonValidator
 * @package DataCollector\Modules\Data\Validators
 */
class JsonValidator implements ValidatorInterface {

    /**
     * @var string $param
     */
    private $param;

    /**
     * @var string $error
     */
    private $error;

    /**
     * JsonValidator constructor.
     *
     * @param string $param
     */
    public function __construct($param) {
        $this->param = $param;
    }

    /**
     * Get error message
     *
     * @return string
     */
    public function getErrorMessage() {
        return $this->error;
    }

    /**
     * Is object has valid state?
     *
     * @return bool
     * @throws \RuntimeException
     */
    public function isValid() {

        $data = json_decode($this->param, true);
        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new \RuntimeException('Unable to parse response body into JSON');
        }

        return $data !== null;
    }
}