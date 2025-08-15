<?php

if (isset($_SESSION['User']) == 1 && isset($_POST['id_servicio'])) {

    $router = new Router();
    $action = $router->getAction();

    $id_servicio = $_POST['id_servicio'];
    $nombre_servicio = $_POST['nombre'] ?? '';

    require_once('controllers/ServiciosController.php');
    $controller = new ServiciosController();

    if ($action == "IngresarServicio1") {
        $result_Servicio = $controller->IngresarServicio2($id_servicio, $nombre_servicio);
    } elseif ($action == "ActualizarServicio1") {
        $result_Servicio = $controller->ActualizarServicio2($id_servicio, $nombre_servicio);
    } elseif ($action == "BorrarServicio1") {
        $result_Servicio = $controller->BorrarServicio2($id_servicio);
    } else {
        $result_Servicio = false;
    }

    if ($result_Servicio == false) {
        ?>
        <div class="my-1"></div>
        <div class="alert alert-warning alert-dismissable" align="justify">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <label for="busqueda" align="right"><strong>Mensaje de Advertencia</strong><br>
                <p style="font-size:12px; color:black">Ocurrió un error procesando el servicio. Por favor verifique los datos e intente nuevamente.</p>
            </label><br>
        </div>
        <?php
        require_once('views/Servicios/cu_servicio.php');

    } else {
        ?>
        <div class="my-1"></div>
        <div class="alert alert-success" align="justify">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <label for="busqueda" align="right"><strong>Mensaje de Éxito</strong><br>
                <p style="font-size:12px; color:black">El registro del Servicio fue procesado correctamente.</p>
            </label><br>
        </div>
        <?php
        require_once('views/Servicios/listarservicios.php');
    }

} else {
    require_once('views/Servicios/listarservicios.php');
}
?>
