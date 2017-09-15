<?php

define('DS', DIRECTORY_SEPARATOR);

require_once __DIR__.DS.'vendor'.DS.'autoload.php';

try {

    $dataModule = new \DataCollector\Modules\Data\Module();
    $dataService = $dataModule->getService();
    $result = $dataService->saveData($_GET['data']);

    echo $result;

} catch (Exception $e) {
    echo $e;
}