<?php
if (isset($_SESSION['User']) && isset($_POST['id_agencia'])) {

    $router = new Router();
    $action = $router->getAction();

    // Validar entrada segura de los campos
    $id_agencia    = $_POST['id_agencia'] ?? "";
    $nombre        = $_POST['nombre'] ?? "";
    $rif           = $_POST['rif'] ?? "";
    $telefono      = $_POST['telefono'] ?? "";
    $email         = $_POST['email'] ?? "";
    $coord_altitud = $_POST['coord_altitud'] ?? null;
    $coord_latitud = $_POST['coord_latitud'] ?? null;
    $id_ciudad     = $_POST['id_ciudad'] ?? "";
    $id_parroquia  = $_POST['id_parroquia'] ?? "";

    require_once('controllers/AgenciasController.php');
    $controller = new AgenciasController();

    if ($action === "IngresarAgencia1") {
        $result_agencia = $controller->IngresarAgencia2(
            $id_agencia,
            $nombre,
            $rif,
            $telefono,
            $email,
            "", // campo dirección eliminado
            $coord_altitud,
            $coord_latitud,
            $id_ciudad,
            $id_parroquia,
            null // servicio opcional
        );
        if (isset($_FILES['foto']) && is_uploaded_file($_FILES['foto']['tmp_name']) && $_FILES['foto']['error'] == 0 ) {
            $tmpName = $_FILES['foto']['tmp_name'];
            $extension = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
            $permitidos = ['jpg', 'jpeg', 'png', 'webp'];

            if (in_array($extension, $permitidos)) {
                $carpetaDestino = "img/agencias/";

                if (!is_dir($carpetaDestino)) {
                    mkdir($carpetaDestino, 0777, true);
                }

                // Eliminar versiones anteriores
                foreach (['jpg', 'jpeg', 'png', 'webp'] as $oldExt) {
                    $oldPath = $carpetaDestino . $id_agencia . '.' . $oldExt;
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                // Guardar nueva imagen
                $nombreFinal = $id_agencia . "." . $extension;
                $rutaFinal = $carpetaDestino . $nombreFinal;

                move_uploaded_file($tmpName, $rutaFinal);
            }
        }
    } elseif ($action === "ActualizarAgencia1") {
        $result_agencia = $controller->ActualizarAgencia2(
            $id_agencia,
            $nombre,
            $rif,
            $telefono,
            $email,
            "", // dirección no se está usando
            $coord_altitud,
            $coord_latitud,
            $id_ciudad,
            $id_parroquia
        );
        if (isset($_FILES['foto']) && is_uploaded_file($_FILES['foto']['tmp_name']) && $_FILES['foto']['error'] == 0 ) {
            $tmpName = $_FILES['foto']['tmp_name'];
            $extension = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
            $permitidos = ['jpg', 'jpeg', 'png', 'webp'];

            if (in_array($extension, $permitidos)) {
                $carpetaDestino = "img/agencias/";

                if (!is_dir($carpetaDestino)) {
                    mkdir($carpetaDestino, 0777, true);
                }

                // Eliminar versiones anteriores
                foreach (['jpg', 'jpeg', 'png', 'webp'] as $oldExt) {
                    $oldPath = $carpetaDestino . $id_agencia . '.' . $oldExt;
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                // Guardar nueva imagen
                $nombreFinal = $id_agencia . "." . $extension;
                $rutaFinal = $carpetaDestino . $nombreFinal;

                move_uploaded_file($tmpName, $rutaFinal);
            }
        }
    } elseif ($action === "BorrarAgencia1") {
        $result_agencia = $controller->BorrarAgencia2($id_agencia);
    }

    // Mostrar resultado
    if ($result_agencia === false) {
        $action = "ActualizarAgencia";  // Para que cu_agencia.php entre en modo actualización
        $id = $id_agencia;

        // Simular error manual (lo leerás desde $_GET)
        $_GET['error'] = 'duplicado';

        // Los valores que ya venían por POST se mantienen
        require_once('views/Agencias/cu_agencia.php');
        exit;
    } else {
        echo '<div class="alert alert-success mt-3">✅ Operación realizada con éxito.</div>';
        require_once('views/Agencias/listaragencias.php');
    }

} else {
    require_once('views/Agencias/listaragencias.php');
}
