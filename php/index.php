<?php
session_start();
require 'controllers/ReservaController.php';

$controller = new ReservaController();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'crear':
        $controller->crear();
        break;

    case 'eliminar':
        $controller->eliminar();
        break;

    default:
        $controller->index();
        break;
}
