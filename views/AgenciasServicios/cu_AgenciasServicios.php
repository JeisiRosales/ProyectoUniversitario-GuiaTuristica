<?php
if (isset($_SESSION['User'])) {
    $router = new Router();
    $action = $router->getAction();
    $id = $router->getId();
    
    $conexion = mysqli_connect("localhost", "root", "", "infomargarita");

    $TipoOperacion = "Ingresar";
    $direccionamiento = SERVERURL . "AgenciasServicios/IngresarAgenciaServicio1";

    $id_agencia = isset($_POST['id_agencia']) ? $_POST['id_agencia'] : '';
    $id_servicio = "";

    // Buscar si la agencia ya está asociada a un servicio
    if (!empty($id_agencia)) {
        $consulta = "SELECT id_servicio FROM tbl_agencia_servicio WHERE id_agencia = '$id_agencia' LIMIT 1";
        $resultado = mysqli_query($conexion, $consulta);
        if ($fila = mysqli_fetch_assoc($resultado)) {
            $id_servicio = $fila['id_servicio'];
        }
    }

    require_once('controllers/AgenciasController.php');
    require_once('controllers/ServiciosController.php');

    $controllerAgencia = new AgenciasController();
    $controllerServicio = new ServiciosController();

    $result_agencias = $controllerAgencia->ListarAgencias1();
    $result_servicios = $controllerServicio->ListarServicios1();
?>


<div class="panel-heading" style="background-color:rgb(220, 53, 69)">
    <div class="row">
        <div class="col-12" style="color: white">
            <h4><b>Asociar Agencia a Servicios</b></h4>
        </div>
    </div>
</div>

<div class="page-content">
    <form action="<?php echo $direccionamiento; ?>" method="POST">
        <div class="alert" style="background-color: #F9F9F9">
            <br><br>
            <div class="row">
                <!-- Agencia -->
                <div class="col-6">
                    <label><b>Agencia:</b></label>
                    <?php
                    $nombre_agencia_seleccionada = "";
                    mysqli_data_seek($result_agencias, 0); // Reiniciar puntero
                    while ($fila = mysqli_fetch_array($result_agencias)) {
                        if ($fila["id_agencia"] == $id_agencia) {
                            $nombre_agencia_seleccionada = $fila["nombre"];
                            break;
                        }
                    }
                    ?>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($nombre_agencia_seleccionada); ?>" readonly>
                    <input type="hidden" name="id_agencia" value="<?php echo htmlspecialchars($id_agencia); ?>">
                </div>

                <!-- Servicios MULTISELECT -->
                <div class="col-6">
                    <label><b>Servicios:</b></label>
                    <select class="form-control" name="id_servicio[]" multiple size="5" required>
                        <?php
                        mysqli_data_seek($result_servicios, 0); // Reiniciar puntero
                        // Para que quede seleccionado lo que ya estaba asociado, puedes obtener los servicios asociados antes
                        $servicios_asociados = [];
                        if (!empty($id_agencia)) {
                            $query_servs = mysqli_query($conexion, "SELECT id_servicio FROM tbl_agencia_servicio WHERE id_agencia = '$id_agencia'");
                            while ($fila_serv = mysqli_fetch_assoc($query_servs)) {
                                $servicios_asociados[] = $fila_serv['id_servicio'];
                            }
                        }

                        while ($fila = mysqli_fetch_array($result_servicios)) {
                            $selected = in_array($fila["id_servicio"], $servicios_asociados) ? "selected" : "";
                            echo "<option value='{$fila["id_servicio"]}' $selected>" . htmlspecialchars($fila["nombre"]) . "</option>";
                        }
                        ?>
                    </select>
                    <small>Ctrl+click para seleccionar varios servicios</small>
                </div>
            </div>
            <br><br>
            <button class="btn btn-outline-success" type="submit"><?php echo $TipoOperacion ?></button>
        </div>
    </form>
</div>
<?php
} else {
    require_once('views/Agencias/listaragencias.php');
}
?>
