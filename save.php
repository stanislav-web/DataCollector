<?php
require_once __DIR__.'/bootstrap.php';


try {

    /** @var \DataCollector\Modules\Data\Module $dataModule */
    $dataModule = $di->get('DataModule');
    $dataModule->getService()->parse($_GET);

} catch (Exception $e) {
    echo $e;
}