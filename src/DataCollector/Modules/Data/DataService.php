<?php
namespace DataCollector\Modules\Data;

use DataCollector\Modules\Data\DataManager\DataMapper;
use DataCollector\Modules\Data\Entities\Data;
use DataCollector\Modules\Data\Validators\DataEntityValidator;
use DataCollector\Modules\Data\Validators\JsonValidator;

/**
 * Class DataService
 * @package DataCollector\Modules\Data
 */
class DataService implements DataServiceInterface {

    /**
     * Total rows per one page
     *
     * @const ROWS_PER_PAGE
     */
    const ROWS_PER_PAGE = 10;

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
     * Fetch data via DataManager
     *
     * @param array $param
     * @throws DataException
     *
     * @return array
     */
    public function fetchData(array $param) {

        try {

            $result = [];

            $currentPage = isset($param['page']) ? (int)$param['page'] : 1;
            $countTotal = $this->dataMapper->countRows();
            $countPages = (int)(($countTotal - 1) / self::ROWS_PER_PAGE) + 1;

            $result['meta'] = [
                'currentPage' =>  $currentPage,
                'countTotal' =>   $countTotal,
                'countPages' =>   $countPages,
                'rowsPerPage' =>  self::ROWS_PER_PAGE,

            ];
            $offset = ($currentPage * self::ROWS_PER_PAGE - self::ROWS_PER_PAGE);
            $result['rows'] =  $this->dataMapper->findRows($param['order'],
                $param['condition'],
                self::ROWS_PER_PAGE,
                $offset
            );

            return $result;

        } catch (\Exception $e) {
            throw new DataException($e->getMessage());
        }
    }

    /**
     * Save data via data manager
     *
     * @param string $inputString
     * @throws DataException
     *
     * @return int
     */
    public function saveData($inputString) {

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