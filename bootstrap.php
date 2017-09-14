<?php
require_once __DIR__.'/vendor/autoload.php';

define('DS', DIRECTORY_SEPARATOR);

$di = new \DataCollector\DependencyContainer(
    new \DataCollector\Registry()
);

try {

    // Register using modules
    $di->register('DataModule', new \DataCollector\Modules\Data\Module());

} catch (Exception $e) {
    echo $e;
}