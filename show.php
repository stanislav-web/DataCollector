<?php

define('DS', DIRECTORY_SEPARATOR);

require_once __DIR__ . DS . 'vendor' . DS . 'autoload.php';

try {

    if (false === empty($_SERVER['HTTP_X_REQUESTED_WITH'])
        && 'xmlhttprequest' === strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])) {

        $dataModule = new \DataCollector\Modules\Data\Module();
        $dataService = $dataModule->getService();

        switch ($_GET['action']) {
            case 'fetch':
                $result = $dataService->fetchData($_REQUEST);
                break;
            case 'update':
                $result = $dataService->updateData($_REQUEST);
                break;
            default:
                $result = [];
        }

        echo json_encode($result);

    } else {
        throw new \DomainException('Forbidden request. Use POST instead');
    }

} catch (Exception $e) {
    echo $e;
}