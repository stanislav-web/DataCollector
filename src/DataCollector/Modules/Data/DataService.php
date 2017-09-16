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
     * @param array $request
     * @throws DataException
     *
     * @return DataTableTransferObject
     */
    public function fetchData(array $request) {

        try {

            $countTotal = $this->dataMapper->countRows();
            $order = current($request['order']);
            $draw = isset ( $request['draw'] ) ? (int)$request['draw']: 0;
            $order['column'] = $request['columns'][$order['column']]['data'];

            $dataObjects = $this->dataMapper->findRows($order['column'],
                $order['dir'],
                $request['length'],
                $request['start']
            );

            $dataTransfer = new DataTableTransferObject();
            $dataTransfer->draw = $draw;
            $dataTransfer->recordsTotal = $countTotal;
            $dataTransfer->recordsFiltered = $countTotal;
            $dataTransfer->data = $dataObjects;
            return $dataTransfer;

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


    /**
     * Update data via data manager
     *
     * @param array $request
     * @throws DataException
     *
     * @return bool
     */
    public function updateData(array $request) {

        try {
            return $this->dataMapper->updateStatusRow($request['id'], $request['status']);
        } catch (\Exception $e) {
            throw new DataException('Undefined error');
        }
    }
}