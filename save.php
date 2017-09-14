<?php
require_once __DIR__.'/vendor/autoload.php';

define('DS', DIRECTORY_SEPARATOR);

$dic = new \DataCollector\DependencyContainer(
    new \DataCollector\Registry()
);

try {

    // @TODO Register using modules


    // @TODO Dispatch router

} catch (Exception $e) {
    echo $e;
}