<?php

// Cargar el controlador
require_once('controllers/ServiciosController.php');
$controller = new ServiciosController();
$result_servicio = $controller->ListarServicios1();

// Conexión directa para obtener nombres de agencias
$conexion = mysqli_connect("localhost", "root", "", "infomargarita");

// Verificar si hay resultados válidos
$numrows = 0;
if ($result_servicio && $result_servicio instanceof mysqli_result) {
    $numrows = mysqli_num_rows($result_servicio);
}
?>

<div class="container-fluid px-2"> <!-- Usamos container-fluid para evitar límites fijos -->

    <div class="panel-heading py-3 px-2 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center" style="background-color: #DC3545">
        <h4 class="text-white m-0"><b>Servicios Registrados</b></h4>
        <form action="<?php echo SERVERURL ?>Servicios/IngresarServicio/" method="POST" class="mt-2 mt-md-0">
            <button type="submit" 
                    class="btn btn-sm btn-light" 
                    style="background-color: rgb(231, 99, 112); border-color: rgb(231, 99, 112);">
                Agregar
            </button>
        </form>
    </div>

    <div class="table-responsive mt-4"> <!-- Envolvemos la tabla para evitar scroll -->
        <table id="dtBasicExample" data-order='[[ 0, "asc" ]]' data-page-length='10' 
               class="table table-sm table-striped table-hover table-bordered" cellspacing="0" width="100%">
            <thead class="text-center">
                <tr>
                    <th class="th-sm">ID</th>
                    <th class="th-sm">Nombre del Servicio</th>
                    <th class="th-sm">Agencia Asociada</th>
                    <th class="th-sm">Actualizar</th>
                    <th class="th-sm">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($numrows > 0) {
                    while ($fila = mysqli_fetch_assoc($result_servicio)) {
                        $id_servicio = $fila['id_servicio'] ?? 'SIN_ID';
                        $nombre_servicio = $fila['nombre'] ?? 'SIN NOMBRE';

                        $nombre_agencias = [];
                        if (!empty($id_servicio)) {
                            $query_agencias = mysqli_query($conexion, "
                                SELECT a.nombre 
                                FROM tbl_agencias a
                                INNER JOIN tbl_agencia_servicio asg ON a.id_agencia = asg.id_agencia
                                WHERE asg.id_servicio = '$id_servicio'
                            ");
                            if ($query_agencias && mysqli_num_rows($query_agencias) > 0) {
                                while ($row_agencia = mysqli_fetch_assoc($query_agencias)) {
                                    $nombre_agencias[] = $row_agencia["nombre"];
                                }
                            }
                        }
                        if (count($nombre_agencias) > 0) {
                            // Puedes separarlos por comas o saltos de línea
                            $nombre_agencia = implode(', ', $nombre_agencias);
                        } else {
                            $nombre_agencia = "❌ No asignado";
                        }

                        ?>
                        <tr>
                            <td class="text-center"><?= htmlspecialchars($id_servicio) ?></td>
                            <td style="word-break: break-word;"><?= htmlspecialchars($nombre_servicio) ?></td>
                            <td style="word-break: break-word;"><?= htmlspecialchars($nombre_agencia) ?></td>

                            <td class="text-center">
                                <form action="<?php echo SERVERURL ?>Servicios/ActualizarServicio/<?php echo $id_servicio ?>" method="POST">
                                    <button type="submit" class="btn btn-sm btn-success">Actualizar</button>
                                </form>
                            </td>

                            <td class="text-center">
                                <form action="<?php echo SERVERURL ?>Servicios/BorrarServicio/<?php echo $id_servicio ?>" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este servicio?');">
                                    <button type="submit" class="btn btn-sm btn-warning">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        <?php 
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No hay servicios registrados.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
