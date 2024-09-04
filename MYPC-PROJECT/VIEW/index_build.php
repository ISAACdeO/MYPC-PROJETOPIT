<?php

require __DIR__ . '/../controller/BuildController.php';
require __DIR__ . '/../model/Class_PCBuilder.php';

use App\Controllers\BuildController;

$controller = new BuildController();

$action = $_GET['action'] ?? 'showOrcamentoForm';

switch ($action) {
    case 'processOrcamento':
        $controller->processOrcamento();
        break;

    case 'saveBuild':
        $controller->saveBuild();
        break;

    case 'showBuilds':
        $controller->showBuilds();
        break;
    
    case 'showOrcamentoForm':
    default:
        $controller->showOrcamentoForm();
        break;
}
