<?php
require_once __DIR__.'/bootstrap.php';


try {

    /** @var \DataCollector\Modules\Data\Module $dataModule */
    $dataModule = $di->get('DataModule');
    var_dump($dataModule->getService());

} catch (Exception $e) {
    echo $e;
}