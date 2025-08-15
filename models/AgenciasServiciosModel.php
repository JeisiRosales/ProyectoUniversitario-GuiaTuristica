<?php

class AgenciasServiciosModel
{
    function __construct()
    {
        // Constructor vacío
    }

    // FUNCIONES GENÉRICAS

    public static function Get_Data($sql){
        include_once('core/Conectar.php');
        $conexion = Conectar::conexion();

        try {
            $result = mysqli_query($conexion, $sql);
            if ($result) { 
                if (mysqli_affected_rows($conexion) == 0) { 
                    return false;
                } else { 
                    return $result;
                }
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        } finally {
            $conexion = Conectar::desconexion($conexion);
        }
    }

    public static function Update_Data($sql) {
        include_once('core/Conectar.php');
        $conexion = Conectar::conexion();
        mysqli_autocommit($conexion, FALSE);

        try {
            $result = mysqli_query($conexion, $sql);

            if ($result) { 
                if (mysqli_affected_rows($conexion) == 0) { 
                    mysqli_rollback($conexion);
                    return false;
                } else { 
                    mysqli_commit($conexion);
                    return true;
                }
            } else {
                mysqli_rollback($conexion);
                return false;
            }
        } catch (Exception $e) {
            return false;
        } finally {
            $conexion = Conectar::desconexion($conexion);
        }
    }

    // FUNCIONES ESPECÍFICAS

    public static function ListarAgenciaServicio() {
        $sql_agenciaServicio = "SELECT * FROM tbl_agencia_servicio WHERE id_agencia = id_servicio";
        $result_agenciaServicio = AgenciasServiciosModel::Get_Data($sql_agenciaServicio);
        return $result_agenciaServicio;
    }

    public static function IngresarAgenciaServicio($id_agencia, $id_servicio){
        include_once('core/Conectar.php');
        $conexion = Conectar::conexion();
        mysqli_autocommit($conexion, FALSE);

        try {
            // Aceptar múltiples servicios (array o valor único)
            if (is_array($id_servicio)) {
                foreach ($id_servicio as $servicio) {
                    $sql = "INSERT INTO tbl_agencia_servicio (id_agencia, id_servicio)
                            VALUES ($id_agencia, $servicio)";
                    $result = mysqli_query($conexion, $sql);
                    if (!$result) {
                        mysqli_rollback($conexion);
                        return false;
                    }
                }
            } else {
                // Si solo se pasó un servicio
                $sql = "INSERT INTO tbl_agencia_servicio (id_agencia, id_servicio)
                        VALUES ($id_agencia, $id_servicio)";
                $result = mysqli_query($conexion, $sql);
                if (!$result) {
                    mysqli_rollback($conexion);
                    return false;
                }
            }

            mysqli_commit($conexion);
            return true;

        } catch (Exception $e) {
            mysqli_rollback($conexion);
            return false;
        } finally {
            $conexion = Conectar::desconexion($conexion);
        }
    }
}
