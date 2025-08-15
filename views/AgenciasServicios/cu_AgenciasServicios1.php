<?php
if (isset($_SESSION['User']) && isset($_POST['id_agencia']) && isset($_POST['id_servicio'])) {
    $router = new Router();
    $action = $router->getAction();

    $id_agencia = $_POST['id_agencia'];
    $id_servicio = $_POST['id_servicio'];

    require_once('controllers/AgenciasServiciosController.php');
    $controller = new AgenciasServiciosController();

    if ($action === "IngresarAgenciaServicio1") {
        $resultado = $controller::IngresarAgenciaServicio2($id_agencia, $id_servicio);
    }

    if ($resultado === false) {
        echo '<div class="alert alert-warning mt-3">⚠️ No se pudo asociar la agencia con el servicio. Intente de nuevo.</div>';
        $direccionamiento = SERVERURL . "AgenciasServicios/" . $action;
        require_once('views/AgenciasServicios/cu_AgenciasServicios.php');
    } else {
        echo '<div class="alert alert-success mt-3">✅ Asociación registrada correctamente.</div>';
        require_once('views/Agencias/listaragencias.php');
    }

} else {
    require_once('views/Agencias/listaragencias.php');
}
?>
