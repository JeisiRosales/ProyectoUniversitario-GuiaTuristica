<?php

class ServiciosModel 
{

    function __construct()
	{
	
	}

    //FUNCIONES GENERICAS PARA INSERT,UPDATE,DELETE y SELECT

    public static function Get_Data($sql){
		include_once('core/Conectar.php');
		$conexion=Conectar::conexion();

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

    //RESTO DE FUNCIONES DE LA TABLA

    public static function ListarServicios(){
        $sql_servicio = "SELECT * FROM tbl_servicio ORDER BY id_servicio ASC";
        $result_servicio = ServiciosModel::Get_Data($sql_servicio);
        return $result_servicio;
    }
    //BUSCAR ULTIMO SERVICIO
    public static function BuscarUltimoServicio(){
        $sql_servicio = "SELECT MAX(id_servicio) AS ultimo_id FROM tbl_servicio";
        $result_servicio = ServiciosModel::Get_Data($sql_servicio);
        return $result_servicio;
    }

    //BUSCAR SERVICIO POR ID
    public static function BuscarServicioById($id){
        $sql_servicio = "SELECT * FROM tbl_servicio WHERE id_servicio = $id";
        $result_servicio = ServiciosModel::Get_Data($sql_servicio);
        return $result_servicio;
    }

    //INGRESAR
    public static function IngresarServicio($id_servicio, $nombre_servicio){
        //Validar para evitar duplicados
        $sql_verificacion = "SELECT * FROM tbl_servicio
                             WHERE nombre = '$nombre_servicio'";
                             
        $result_verificacion = ServiciosModel::Get_Data($sql_verificacion);

        if($result_verificacion !== false){
            //Ya hay un servicio con ese nombre
            return false;
        }

        //Ingresar servicio sin duplicar
        $sql_servicio = "INSERT INTO tbl_servicio (id_servicio, nombre)
                         VALUES ($id_servicio, '$nombre_servicio')";
        $result_servicio = ServiciosModel::Update_Data($sql_servicio);
        return $result_servicio;
    }

    //ACTUALIZAR
    public static function ActualizarServicio($id_servicio, $nombre_servicio){
        //Validar para evitar duplicados
        $sql_verificacion = "SELECT * FROM tbl_servicio
                             WHERE nombre = '$nombre_servicio'
                             AND id_servicio != $id_servicio";
                             
        $result_verificacion = ServiciosModel::Get_Data($sql_verificacion);

        if($result_verificacion !== false){
            //Ya hay un servicio con ese nombre
            return false;
        }

        $sql_servicio = "UPDATE tbl_servicio
                         SET nombre = '$nombre_servicio'
                         WHERE id_servicio = $id_servicio";
        $result_servicio = ServiciosModel::Update_Data($sql_servicio);
        return $result_servicio;
    }

    //BORRAR
    public static function BorrarServicio($id_servicio) {
        $sql_servicio = "DELETE FROM tbl_servicio WHERE id_servicio = $id_servicio";
        $result_servicio = ServiciosModel::Update_Data($sql_servicio);
        return $result_servicio;
    }
}

?>