<?php 
    require_once('controllers/AgenciasController.php');
    $controller = new AgenciasController();
    $result_agencia = $controller->ListarAgencias1();

    $numrows = 0;
    if ($result_agencia && $result_agencia instanceof mysqli_result) {
        $numrows = mysqli_num_rows($result_agencia);
    }

    $conexion = mysqli_connect("localhost", "root", "", "infomargarita");
?>

<style>
    table {
        width: 100%;
        font-size: 14px;
        table-layout: auto;
        word-wrap: break-word;
    }

    th, td {
        vertical-align: middle !important;
        text-align: center;
    }

    @media screen and (max-width: 768px) {
        table {
            font-size: 12px;
        }

        .btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }
    }
</style>

<div class="container-fluid">

    <div class="panel-heading" style="background-color: #DC3545">
        <div class="row">
            <div class="col-10" style="color: white">
                <h4><b>Agencias Registradas</b></h4>
            </div>
            <div class="col-2">
                <form action="<?php echo SERVERURL ?>Agencias/IngresarAgencia" method="POST">
                    <button style="background-color:rgb(231, 99, 112); border-color:rgb(231, 99, 112);" type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
        </div>  
    </div>

    <br><br>

    <table id="dtBasicExample" data-order='[[ 0, "asc" ]]' data-page-length='10' 
           class="table table-sm table-striped table-hover table-bordered" cellspacing="0" width="100%">

        <thead>
            <tr>
                <th class="th-sm">ID</th>
                <th class="th-sm">Imagen</th>
                <th class="th-sm">Nombre</th>
                <th class="th-sm">RIF</th>
                <th class="th-sm">Teléfono</th>
                <th class="th-sm">Email</th>
                <th class="th-sm">Ciudad</th>
                <th class="th-sm">Parroquia</th>
                <th class="th-sm">Actualizar</th>
                <th class="th-sm">Eliminar</th>
                <th class="th-sm">Asociar</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            if ($numrows > 0) {
                while ($fila = mysqli_fetch_array($result_agencia)) {
                    $id = isset($fila["id_agencia"]) ? $fila["id_agencia"] : 'SIN_ID';

                    $nombre_ciudad = "Desconocida";
                    if (!empty($fila["Cod_Ciudad"])) {
                        $query_ciudad = mysqli_query($conexion, "SELECT Des_Ciudad FROM tbl_ciudad WHERE Cod_Ciudad = '{$fila["Cod_Ciudad"]}'");
                        if ($row_ciudad = mysqli_fetch_assoc($query_ciudad)) {
                            $nombre_ciudad = $row_ciudad["Des_Ciudad"];
                        }
                    }

                    $nombre_parroquia = "Desconocida";
                    if (!empty($fila["Cod_Parroquia"])) {
                        $query_parroquia = mysqli_query($conexion, "SELECT Des_Parroquia FROM tbl_parroquia WHERE Cod_Parroquia = '{$fila["Cod_Parroquia"]}'");
                        if ($row_parroquia = mysqli_fetch_assoc($query_parroquia)) {
                            $nombre_parroquia = $row_parroquia["Des_Parroquia"];
                        }
                    }
                    $ruta_img = "";
                    $formats = ['jpg', 'jpeg', 'png', 'webp'];
                    foreach ($formats as $ext) {
                        $filePath = "img/agencias/" . $id . "." . $ext;
                        if (file_exists($filePath)) {
                            $ruta_img = SERVERURL . $filePath;
                            break;
                        }
                    }
                    if ($ruta_img == "") {
                        $ruta_img = SERVERURL . "img/agencias/default.jpeg";
                    }
            ?>
            <tr>
                <th scope="row"><?php echo $fila["id_agencia"]; ?></th>
                <td>
                    <img src="<?php echo $ruta_img; ?>" width="60" height="60" class="img-thumbnail" alt="Foto Agencia">
                </td>
                <td><?php echo $fila["nombre"]; ?></td>
                <td><?php echo $fila["rif"]; ?></td>
                <td><?php echo $fila["telefono"]; ?></td>
                <td><?php echo $fila["email"]; ?></td>
                <td><?php echo htmlspecialchars($nombre_ciudad); ?></td>
                <td><?php echo htmlspecialchars($nombre_parroquia); ?></td>

                <td>
                    <form action="<?php echo SERVERURL ?>Agencias/ActualizarAgencia/<?php echo $id ?>" method="POST">
                        <button type="submit" class="btn btn-sm btn-success">Actualizar</button>
                    </form>
                </td>

                <td>
                    <form action="<?php echo SERVERURL ?>Agencias/BorrarAgencia/<?php echo $id ?>" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta agencia?');">
                        <button type="submit" class="btn btn-sm btn-warning">Eliminar</button>
                    </form>
                </td>

                <td>
                    <form action="<?php echo SERVERURL ?>AgenciasServicios/IngresarAgenciaServicio/" method="POST">
                        <input type="hidden" name="id_agencia" value="<?php echo $id; ?>">
                        <button type="submit" class="btn btn-sm btn-primary">Asociar</button>
                    </form>
                </td>
            </tr>
            <?php 
                }
            }
            ?>
        </tbody>
    </table>
</div>
