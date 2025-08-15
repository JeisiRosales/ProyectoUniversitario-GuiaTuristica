<?php
if (isset($_SESSION['User'])) {
    // Mostrar mensaje si viene desde una redirección con error
    if (isset($_GET['error']) && $_GET['error'] === 'duplicado') {
        echo '<div class="alert alert-danger mt-3">❌ Ya existe una agencia con alguno de los datos ingresados (nombre, RIF, teléfono o email).</div>';
    }
    $router = new Router();
    $action = $router->getAction();
    $id = $router->getId();

    $conexion = mysqli_connect("localhost", "root", "", "infomargarita");

    // Inicializar variables
    $TipoOperacion = "Ingresar";
    $id_agencia = $nombre = $rif = $telefono = $email = $coord_altitud = $coord_latitud = "";
    $id_estado = $id_municipio = $id_ciudad = $id_parroquia = "";

    // Determinar tipo de operación
    if ($action == "IngresarAgencia" || $action == "IngresarAgencia1") {
        $TipoOperacion = "Ingresar";
        $direccionamiento = SERVERURL . "Agencias/IngresarAgencia1";

        require_once('controllers/AgenciasController.php');
        $controller = new AgenciasController();

        if ($action == "IngresarAgencia" && empty($_POST['id_agencia'])) {
            $result = $controller->BuscarUltimaAgencia();
            $id_agencia = 1;
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                $id_agencia = intval($row["ultimo_id"]) + 1;
            }
        }

    } elseif ($action == "ActualizarAgencia" || $action == "ActualizarAgencia1") {
        $TipoOperacion = "Actualizar";
        $direccionamiento = SERVERURL . "Agencias/ActualizarAgencia1";

        $id_agencia = $id;
        require_once('models/AgenciasModel.php');
        $result = AgenciasModel::BuscarAgenciaById($id_agencia);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $nombre = $row['nombre'] ?? '';
            $rif = $row['rif'] ?? '';
            $telefono = $row['telefono'] ?? '';
            $email = $row['email'] ?? '';
            $coord_altitud = $row['coord_altitud'] ?? '';
            $coord_latitud = $row['coord_latitud'] ?? '';
            $id_ciudad = $row['Cod_Ciudad'] ?? '';
            $id_parroquia = $row['Cod_Parroquia'] ?? '';
            $id_municipio = $row['Cod_Municipio'] ?? '';
            $id_estado = $row['Cod_Estado'] ?? '';

            if ($id_ciudad) {
                $query = mysqli_query($conexion, "SELECT Cod_Estado FROM tbl_ciudad WHERE Cod_Ciudad = '$id_ciudad'");
                if ($row_ciudad = mysqli_fetch_array($query)) {
                    $id_estado = $row_ciudad['Cod_Estado'];
                }
            }
            if ($id_parroquia) {
                $query = mysqli_query($conexion, "SELECT Cod_Municipio FROM tbl_parroquia WHERE Cod_Parroquia = '$id_parroquia'");
                if ($row_parroquia = mysqli_fetch_array($query)) {
                    $id_municipio = $row_parroquia['Cod_Municipio'];
                }
            }
        }

    } elseif ($action == "BorrarAgencia" || $action == "BorrarAgencia1") {
        $TipoOperacion = "Borrar";
        $direccionamiento = SERVERURL . "Agencias/BorrarAgencia1";

        $id_agencia = $id;
        require_once('controllers/AgenciasController.php');
        $controller = new AgenciasController();
        $result = $controller->BuscarAgenciaById($id_agencia);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $nombre = $row["nombre"] ?? "";
            $rif = $row["rif"] ?? "";
            $telefono = $row["telefono"] ?? "";
            $email = $row["email"] ?? "";
            $coord_altitud = $row["coord_altitud"] ?? "";
            $coord_latitud = $row["coord_latitud"] ?? "";
            $id_ciudad = $row["Cod_Ciudad"] ?? "";
            $id_parroquia = $row["Cod_Parroquia"] ?? "";

            if ($id_ciudad) {
                $query = mysqli_query($conexion, "SELECT Cod_Estado FROM tbl_ciudad WHERE Cod_Ciudad = '$id_ciudad'");
                if ($row_ciudad = mysqli_fetch_array($query)) {
                    $id_estado = $row_ciudad['Cod_Estado'];
                }
            }
            if ($id_parroquia) {
                $query = mysqli_query($conexion, "SELECT Cod_Municipio FROM tbl_parroquia WHERE Cod_Parroquia = '$id_parroquia'");
                if ($row_parroquia = mysqli_fetch_array($query)) {
                    $id_municipio = $row_parroquia['Cod_Municipio'];
                }
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_agencia = $_POST['id_agencia'] ?? $id_agencia;
        $nombre = $_POST['nombre'] ?? $nombre;
        $rif = $_POST['rif'] ?? $rif;
        $telefono = $_POST['telefono'] ?? $telefono;
        $email = $_POST['email'] ?? $email;
        $coord_altitud = $_POST['coord_altitud'] ?? $coord_altitud;
        $coord_latitud = $_POST['coord_latitud'] ?? $coord_latitud;
        $id_estado = $_POST['id_estado'] ?? $id_estado;
        $id_municipio = $_POST['id_municipio'] ?? $id_municipio;
        $id_ciudad = $_POST['id_ciudad'] ?? $id_ciudad;
        $id_parroquia = $_POST['id_parroquia'] ?? $id_parroquia;
    }

    $estados = mysqli_query($conexion, "SELECT * FROM tbl_estado");
    if (!empty($id_estado)) {
        $municipios = mysqli_query($conexion, "SELECT * FROM tbl_municipio WHERE Cod_Estado = '$id_estado'");
        $ciudades = mysqli_query($conexion, "SELECT * FROM tbl_ciudad WHERE Cod_Estado = '$id_estado'");
    }
    if (!empty($id_municipio)) {
        $parroquias = mysqli_query($conexion, "SELECT * FROM tbl_parroquia WHERE Cod_Municipio = '$id_municipio'");
    }
?>

<div class="container mt-3">
    <form action="<?= $direccionamiento ?>" method="POST" id="formAgencia" enctype="multipart/form-data">
        <div class="card rounded border-0 shadow">
            <div style="background-color: #DC3545; color: white;" class="px-4 py-2 rounded-top">
                <h5 class="mb-0"><strong>Agencias / <?= $TipoOperacion ?> Agencia</strong></h5>
            </div>

            <div class="card-body p-4">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label><b>ID Agencia</b></label>
                        <input type="text" class="form-control" value="<?= htmlspecialchars($id_agencia) ?>" readonly>
                        <input type="hidden" name="id_agencia" value="<?= $id_agencia ?>">
                    </div>
                    <div class="col-md-9">
                        <label><b>Nombre</b></label>
                        <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($nombre) ?>" <?= ($TipoOperacion == 'Borrar') ? 'readonly' : '' ?> required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label><b>RIF</b></label>
                        <input type="text" name="rif" class="form-control" value="<?= htmlspecialchars($rif) ?>" <?= ($TipoOperacion == 'Borrar') ? 'readonly' : '' ?> required>
                    </div>
                    <div class="col-md-4">
                        <label><b>Teléfono</b></label>
                        <input type="tel" name="telefono" class="form-control" value="<?= htmlspecialchars($telefono) ?>" <?= ($TipoOperacion == 'Borrar') ? 'readonly' : '' ?> required>
                    </div>
                    <div class="col-md-4">
                        <label><b>Email</b></label>
                        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($email) ?>" <?= ($TipoOperacion == 'Borrar') ? 'readonly' : '' ?>>
                    </div>
                </div>

                <!-- Selects de ubicación -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label><b>Estado</b></label>
                        <select name="id_estado" id="cbx_estado" class="form-control" required <?= ($TipoOperacion == 'Borrar') ? 'disabled' : '' ?>>
                            <option value="">Seleccione</option>
                            <?php while ($row = mysqli_fetch_array($estados)) { ?>
                                <option value="<?= $row['Cod_Estado'] ?>" <?= ($id_estado == $row['Cod_Estado']) ? "selected" : "" ?>>
                                    <?= $row['Des_Estado'] ?>
                                </option>
                            <?php } ?>
                        </select>
                        <?php if ($TipoOperacion == 'Borrar'): ?>
                            <input type="hidden" name="id_estado" value="<?= $id_estado ?>">
                        <?php endif; ?>
                    </div>
                    <div class="col-md-3">
                        <label><b>Municipio</b></label>
                        <select name="id_municipio" id="cbx_municipio" class="form-control" required <?= ($TipoOperacion == 'Borrar') ? 'disabled' : '' ?>>
                            <option value="">Seleccione</option>
                            <?php 
                            if ($id_estado) {
                                $municipios = mysqli_query($conexion, "SELECT * FROM tbl_municipio WHERE Cod_Estado = '$id_estado'");
                                while ($row = mysqli_fetch_array($municipios)) { ?>
                                    <option value="<?= $row['Cod_Municipio'] ?>" <?= ($id_municipio == $row['Cod_Municipio']) ? "selected" : "" ?>>
                                        <?= $row['Des_Municipio'] ?>
                                    </option>
                                <?php }
                            } ?>
                        </select>
                        <?php if ($TipoOperacion == 'Borrar'): ?>
                            <input type="hidden" name="id_municipio" value="<?= $id_municipio ?>">
                        <?php endif; ?>
                    </div>
                    <div class="col-md-3">
                        <label><b>Ciudad</b></label>
                        <select name="id_ciudad" id="cbx_ciudad" class="form-control" required <?= ($TipoOperacion == 'Borrar') ? 'disabled' : '' ?>>
                            <option value="">Seleccione</option>
                            <?php 
                            if ($id_estado) {
                                $ciudades = mysqli_query($conexion, "SELECT * FROM tbl_ciudad WHERE Cod_Estado = '$id_estado'");
                                while ($row = mysqli_fetch_array($ciudades)) { ?>
                                    <option value="<?= $row['Cod_Ciudad'] ?>" <?= ($id_ciudad == $row['Cod_Ciudad']) ? "selected" : "" ?>>
                                        <?= $row['Des_Ciudad'] ?>
                                    </option>
                                <?php }
                            } ?>
                        </select>
                        <?php if ($TipoOperacion == 'Borrar'): ?>
                            <input type="hidden" name="id_ciudad" value="<?= $id_ciudad ?>">
                        <?php endif; ?>
                    </div>
                    <div class="col-md-3">
                        <label><b>Parroquia</b></label>
                        <select name="id_parroquia" id="cbx_parroquia" class="form-control" required <?= ($TipoOperacion == 'Borrar') ? 'disabled' : '' ?>>
                            <option value="">Seleccione</option>
                            <?php 
                            if ($id_municipio) {
                                $parroquias = mysqli_query($conexion, "SELECT * FROM tbl_parroquia WHERE Cod_Municipio = '$id_municipio'");
                                while ($row = mysqli_fetch_array($parroquias)) { ?>
                                    <option value="<?= $row['Cod_Parroquia'] ?>" <?= ($id_parroquia == $row['Cod_Parroquia']) ? "selected" : "" ?>>
                                        <?= $row['Des_Parroquia'] ?>
                                    </option>
                                <?php }
                            } ?>
                        </select>
                        <?php if ($TipoOperacion == 'Borrar'): ?>
                            <input type="hidden" name="id_parroquia" value="<?= $id_parroquia ?>">
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Coordenadas -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label><b>Altitud</b></label>
                        <input type="text" name="coord_altitud" class="form-control" value="<?= htmlspecialchars($coord_altitud) ?>" <?= ($TipoOperacion == 'Borrar') ? 'readonly' : '' ?> required>
                    </div>
                    <div class="col-md-6">
                        <label><b>Latitud</b></label>
                        <input type="text" name="coord_latitud" class="form-control" value="<?= htmlspecialchars($coord_latitud) ?>" <?= ($TipoOperacion == 'Borrar') ? 'readonly' : '' ?> required>
                    </div>
                </div>
                <?php if ($TipoOperacion != "Borrar") { ?>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label><b>Imagen de la Agencia</b></label>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                    </div>
                </div>
                <?php } ?>

                <input type="hidden" name="guardar" value="true">
                <input type="hidden" name="SERVERURL" id="SERVERURL" value="<?= SERVERURL ?>">
                <input type="hidden" name="SERVERDIR" id="SERVERDIR" value="<?= SERVERDIR ?>">

                <div class="text-end">
                    <?php if ($TipoOperacion == 'Borrar'): ?>
                        <button type="submit" class="btn btn-danger">Confirmar Eliminación</button>
                    <?php else: ?>
                        <button type="submit" class="btn btn-success"><?= $TipoOperacion ?></button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="<?= SERVERURL ?>js/agencias.js" type="text/javascript"></script>

<style>
    /* Evita scroll horizontal y ajusta container para que no desborde */
    .container {
        max-width: 100%;
        overflow-x: hidden;
    }
    .row {
        margin-left: 0;
        margin-right: 0;
    }
    .form-control {
        max-width: 100%;
    }
    @media (max-width: 768px) {
        .form-control {
            font-size: 14px;
        }
        label {
            font-size: 14px;
        }
        .btn {
            font-size: 0.875rem;
            padding: 0.5rem 0.75rem;
        }
    }
</style>

<?php
} else {
    require_once('views/Agencias/listaragencias.php');
}
?>
