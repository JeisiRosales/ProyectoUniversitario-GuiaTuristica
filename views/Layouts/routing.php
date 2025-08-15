<?php
$controllers = require 'config/menu_controllers.php';

// Extraer PATH de la URL
$request = $_SERVER['REQUEST_URI'];
$request = str_replace("/infomargarita/", "", $request);
$request = explode("?", $request)[0]; // Elimina query strings
$segments = explode("/", trim($request, "/"));

// Capturar controller, action y id
$controller = $segments[0] ?? '';
$action = $segments[1] ?? '';
$id = $segments[2] ?? null; // Este es tu ID

if (@array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action, $id);
    }
}

function call($controller, $action, $id = null) {
    require_once('controllers/' . $controller . 'Controller.php');

    switch ($controller) {
        case 'Estados':
            $controller = new EstadosController();
            break;
        case 'Municipios':
            $controller = new MunicipiosController();
            break;
        case 'Parroquias':
            $controller = new ParroquiasController();
            break;
        case 'Ciudades':
            $controller = new CiudadesController();
            break;
        case 'Agencias':
            $controller = new AgenciasController();
            break;
        case 'Servicios':
            $controller = new ServiciosController();
            break;
        case 'AgenciasServicios':
            $controller = new AgenciasServiciosController();
            break;
    }

    // Ejecutar acción, pasando el ID si existe
    if ($id !== null) {
        $controller->{$action}($id);
    } else {
        $controller->{$action}();
    }
}
