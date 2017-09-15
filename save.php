<?php
require_once __DIR__.'/bootstrap.php';


try {

    /** @var \DataCollector\Modules\Data\Module $dataModule */
    $dataModule = $di->get('DataModule');
    $dataService = $dataModule->getService();
    $result = $dataService->save($_GET['data']);

    echo $result;
    
} catch (Exception $e) {
    echo $e;
}