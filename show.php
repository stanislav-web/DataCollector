<?php

define('DS', DIRECTORY_SEPARATOR);

require_once __DIR__.DS.'vendor'.DS.'autoload.php';

try {

//    if(false === empty($_SERVER['HTTP_X_REQUESTED_WITH'])
//        && 'xmlhttprequest' === strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])) {
//
//        if('POST' === $_SERVER['REQUEST_METHOD']) {
            $dataModule = new \DataCollector\Modules\Data\Module();
            $dataService = $dataModule->getService();
            $_POST = [
                'page' => 3,
                'order'=> 'status',
                'condition' => 'DESC'
            ];
            $result = $dataService->fetchData($_POST);
           echo json_encode($result);

//        } else {
//            throw new \DomainException('Forbidden request. Use POST instead');
//        }
//
//    } else {
//        throw new \DomainException('Unknown request type');
//    }
} catch (Exception $e) {
    echo $e;
}