<?php
if (isset($_SESSION['User']) == 1) {

    $router = new Router();
    $action = $router->getAction();
    $id = $router->getId();

    $TipoOperacion = "Ingresar";
    $direccionamiento = SERVERURL . "Servicios/IngresarServicio1";

    $id_servicio = "";
    $nombre_servicio = "";

    require_once('controllers/ServiciosController.php');
    $controller = new ServiciosController();

    if ($action == "IngresarServicio") {
        $TipoOperacion = "Ingresar";
        $direccionamiento = SERVERURL . "Servicios/IngresarServicio1";

        $result_ultimo = $controller->BuscarUltimoServicio();
        if ($result_ultimo && $row = mysqli_fetch_assoc($result_ultimo)) {
            $id_servicio = intval($row['ultimo_id']) + 1;
        } else {
            $id_servicio = 1;
        }
    } elseif ($action == "ActualizarServicio" || $action == "BorrarServicio") {
        if ($action == "ActualizarServicio") {
            $TipoOperacion = "Actualizar";
            $direccionamiento = SERVERURL . "Servicios/ActualizarServicio1";
        }
        if ($action == "BorrarServicio") {
            $TipoOperacion = "Borrar";
            $direccionamiento = SERVERURL . "Servicios/BorrarServicio1";
        }

        $id_servicio = $id;
        $result_servicio = $controller->BuscarServicioById($id_servicio);

        if (!empty($result_servicio) && mysqli_num_rows($result_servicio) != 0) {
            $row = mysqli_fetch_assoc($result_servicio);
            $id_servicio = $row["id_servicio"];
            $nombre_servicio = $row['nombre'];
        }
    } elseif (
        $action == "IngresarServicio1" ||
        $action == "ActualizarServicio1" ||
        $action == "BorrarServicio1"
    ) {
        if (isset($_POST['id_servicio'])) {
            $id_servicio = $_POST['id_servicio'];
            $nombre_servicio = $_POST['nombre'];
        }

        if ($action == "IngresarServicio1") {
            $TipoOperacion = "Ingresar";
            $direccionamiento = SERVERURL . "Servicios/IngresarServicio1";
        } elseif ($action == "ActualizarServicio1") {
            $TipoOperacion = "Actualizar";
            $direccionamiento = SERVERURL . "Servicios/ActualizarServicio1";
        } elseif ($action == "BorrarServicio1") {
            $TipoOperacion = "Borrar";
            $direccionamiento = SERVERURL . "Servicios/BorrarServicio1";
        }
    }
?>

    <div class="panel-heading" style="background-color: rgb(220, 53, 69)">
        <div class="row">
            <div class="col-12" style="color: white">
                <h4><b>Servicios / <?php echo $TipoOperacion; ?> Servicio</b></h4>
            </div>
        </div>
    </div>

    <div class="page-content">
        <form action="<?php echo $direccionamiento; ?>" method="POST">

            <div class="alert" style="background-color: #F9F9F9;">
                <br><br>
                <div class="row">
                    <div class="col-3">
                        <label for="id_servicio"><b>ID Servicio:</b></label>
                        <input class="form-control" type="text" name="id_servicio" id="id_servicio" 
                               value="<?php echo htmlspecialchars($id_servicio); ?>" readonly required>
                    </div>

                    <div class="col-9">
                        <label for="nombre"><b>Nombre del Servicio:</b></label>
                        <input class="form-control" type="text" name="nombre" id="nombre" 
                               maxlength="100" required 
                               pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s.,-]{3,100}"
                               title="Solo letras, números y caracteres básicos permitidos. 3 a 100 caracteres."
                               value="<?php echo htmlspecialchars($nombre_servicio); ?>"
                               <?php echo ($TipoOperacion == 'Borrar') ? 'readonly' : ''; ?>>
                    </div>
                </div>
                <br><br>
                <button class="btn btn-outline-<?php echo ($TipoOperacion == 'Borrar') ? 'danger' : 'success'; ?>" 
                        type="submit"><?php echo $TipoOperacion; ?></button>
            </div>

        </form>
    </div>

<?php
} else {
    require_once('views/Servicios/listarservicios.php');
}
?>
