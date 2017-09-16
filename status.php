<?php

define('DS', DIRECTORY_SEPARATOR);

require_once __DIR__ . DS . 'vendor' . DS . 'autoload.php';

try {

    if (false === empty($_SERVER['HTTP_X_REQUESTED_WITH'])
        && 'xmlhttprequest' === strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])) {

        $dataModule = new \DataCollector\Modules\Data\Module();
        $dataService = $dataModule->getService();

        if ('update' === $_GET['action']) {
            $result = $dataService->updateData($_REQUEST);
            echo json_encode($result);
        } else {
            throw new \Exception('Undefined action error');
        }
    } else {
        throw new \DomainException('Forbidden request. Use POST instead');
    }

} catch (Exception $e) {
    echo $e;
}