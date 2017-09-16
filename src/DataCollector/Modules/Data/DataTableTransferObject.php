<?php
namespace DataCollector\Modules\Data;

use DataCollector\Modules\Data\Entities\Data;

/**
 * Class DataTableTransferObject
 * @package DataCollector\Modules\Data
 */
class DataTableTransferObject {

    public $draw = 0;

    public $recordsTotal = 0;

    public $recordsFiltered = 0;

    /**
     * @var Data[]
     */
    public $data = [];

//
//{
//"draw": 1,
//"recordsTotal": 57,
//"recordsFiltered": 57,
//"data": [
//{
//"DT_RowId": "row_3",
//"DT_RowData": {
//"pkey": 3
//},
//"first_name": "Angelica",
//            "last_name": "Ramos",
//            "position": "System Architect",
//            "office": "London",
//            "start_date": "9th Oct 09",
//            "salary": "$2,875"
//        },
//        {
//            "DT_RowId": "row_17",
//            "DT_RowData": {
//            "pkey": 17
//            },
//            "first_name": "Ashton",
//            "last_name": "Cox",
//            "position": "Technical Author",
//            "office": "San Francisco",
//            "start_date": "12th Jan 09",
//            "salary": "$4,800"
//        },
//        ...
//    ]
//}
}