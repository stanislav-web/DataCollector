<?php
namespace DataCollector\Modules\Data\Db\Exception;

/**
 * Class DbException
 * @package DataCollector\Modules\Data\Db\Exception
 */
class DbException extends \Exception {

    const CODE = 500;

    /**
     * DbException constructor.
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