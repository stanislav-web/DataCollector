<?php
namespace DataCollector\Modules\Data;

use DataCollector\Modules\Data\DataManager\DataMapper;
use DataCollector\Modules\Data\Entities\AbstractEntity;
use DataCollector\Modules\Data\Entities\Data;
use DataCollector\Modules\Data\Validators\DataEntityValidator;
use DataCollector\Modules\Data\Validators\JsonValidator;

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

    /**
     * Save data via data manager
     *
     * @param string $inputString
     * @throws DataException
     *
     * @return int
     */
    public function save($inputString) {

        try {

            $validator = new JsonValidator($inputString);
            if(false === $validator->isValid()) {
                throw new DataException($validator->getErrorMessage());
            }

            $dataArray = json_decode($inputString, true);

            $entity = new Data($dataArray);
            $validator = new DataEntityValidator($entity);
            if(false === $validator->isValid()) {
                throw new DataException($validator->getErrorMessage());
            }

            return $this->dataMapper->addEntity($entity);

        } catch (\Exception $e) {
            throw new DataException($e->getMessage());
        }
    }



}