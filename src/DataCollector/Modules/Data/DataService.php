<?php
namespace DataCollector\Modules\Data;

use DataCollector\Modules\Data\DataManager\DataMapper;

/**
 * Class DataService
 * @package DataCollector\Modules\Data
 */
class DataService implements DataServiceInterface {

    /**
     * @var DataMapper $dataMapper
     */
    private $dataMapper;

    /**
     * DataService constructor.
     *
     * @param DataMapper $dataMapper
     */
    public function __construct(DataMapper $dataMapper) {
        $this->dataMapper = $dataMapper;
    }


    public function parse(array $params) {
        var_dump($params);
        exit;
    }


}