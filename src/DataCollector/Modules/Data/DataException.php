<?php
namespace DataCollector\Modules\Data;

/**
 * Class DataException
 * @package DataCollector\Modules\Data
 */
class DataException extends \Exception {

    const CODE = 400;

    /**
     * DataException constructor.
     *
     * @param string          $message
     * @param int             $code
     * @param \Exception|null $previous
     */
    public function __construct($message, $code = self::CODE, \Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return string
     */
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}