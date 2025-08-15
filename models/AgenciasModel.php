<?php

class AgenciasModel{


    function __construct(){

    }

    //FUNCIONES GENERICAS PARA SELECT, UPDATE, INSERT Y DELETE

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

    //FUNCIONES DE LA TABLA

    public static function ListarAgencias() {
        $sql_agencia = "SELECT * FROM tbl_agencias ORDER BY Id_agencia ASC";
        $result_agencia = AgenciasModel::Get_Data($sql_agencia);
        return $result_agencia;
    }

    //BUSCAR ULTIMA AGENCIA
    public static function BuscarUltimaAgencia(){
        $sql_agencia = "SELECT MAX(Id_agencia) AS ultimo_id FROM tbl_agencias";
        $result_agencia = AgenciasModel::Get_Data($sql_agencia);
        return $result_agencia;
    }

    //BUSCAR AGENCIA POR RIF (PARA VERIFICAR SI YA ESTA)
    public static function BuscarAgenciaByRif($rif){
        $sql_agencia = "SELECT Rif FROM tbl_agencias WHERE Rif = '$rif'";
        $result_agencia = AgenciasModel::Get_Data($sql_agencia);
        return $result_agencia;
    }

    //BUSCAR AGENCIA POR ID
    public static function BuscarAgenciaById($id){
        $sql_agencia = "SELECT a.*,
                                c.Cod_Estado,
                                c.Cod_Ciudad,
                                c.Des_Ciudad,
                                p.Cod_Parroquia,
                                p.Des_Parroquia,
                                p.Cod_Municipio,
                                m.Des_Municipio
                            FROM tbl_agencias a
                            LEFT JOIN tbl_ciudad c ON a.Cod_Ciudad = c.Cod_Ciudad
                            LEFT JOIN tbl_parroquia p ON a.Cod_Parroquia = p.Cod_Parroquia
                            LEFT JOIN tbl_municipio m ON p.Cod_Municipio = m.Cod_Municipio
                            WHERE a.Id_agencia = $id";
        $result_agencia = AgenciasModel::Get_Data($sql_agencia);
        return $result_agencia;
    }
    //INSERCIÓN

    public static function IngresarAgencias($id, $nombre, $rif, $telefono, $email, $direccion, $coor_altitud, $coord_latitud, $id_ciudad, $id_parroquia){
    //Validacion para evitar duplicados
    $sql_verificacion = "SELECT * FROM tbl_agencias 
                  WHERE nombre = '$nombre' 
                     OR rif = '$rif' 
                     OR telefono = '$telefono' 
                     OR email = '$email'";

    $result_verificacion = AgenciasModel::Get_Data($sql_verificacion);

    if ($result_verificacion !== false) {
        // Ya existe una agencia con esos datos
        return false;
    }
        
    //Ingresar agencia sin duplicados
    $sql_agencia = "INSERT INTO tbl_agencias (id_agencia, nombre, rif, telefono, email, direccion, coord_altitud, coord_latitud, Cod_Ciudad, Cod_Parroquia)
                    VALUES ($id, '$nombre', '$rif', '$telefono', '$email', '$direccion', $coor_altitud, $coord_latitud, $id_ciudad, $id_parroquia)";
    $result_agencia = AgenciasModel::Update_Data($sql_agencia);
    return $result_agencia;
    }

    //ACTUALIZACIÓN

    public static function ActualizarAgencias($id, $nombre, $rif, $telefono, $email, $direccion, $coord_altitud, $coord_latitud, $id_ciudad, $id_parroquia){
        //Validacion para evitar duplicados
        $sql_verificacion = "SELECT * FROM tbl_agencias 
                         WHERE nombre = '$nombre' 
                           AND rif = '$rif' 
                           AND telefono = '$telefono' 
                           AND email = '$email'
                           AND id_agencia != $id";

    $result_verificacion = AgenciasModel::Get_Data($sql_verificacion);

    if ($result_verificacion !== false) {
        // Ya existe una agencia con esos datos
        return false;
    }
    
        $result_agencia = "UPDATE tbl_agencias 
                        SET
                            Nombre = '$nombre',
                            Rif = '$rif',
                            Telefono = '$telefono',
                            Email = '$email',
                            Direccion = '$direccion',
                            Coord_altitud = $coord_altitud,
                            Coord_latitud = $coord_latitud,
                            Cod_Ciudad = $id_ciudad,
                            Cod_Parroquia = $id_parroquia
                            WHERE Id_agencia = $id";
        $result_agencia = AgenciasModel::Update_Data($result_agencia);
        return $result_agencia;
    }

    //ELIMINAR

    public static function BorrarAgencias ($id){
        $sql_agencia = "DELETE FROM tbl_agencias WHERE Id_agencia = $id";
        $result_agencia = AgenciasModel::Update_Data($sql_agencia);
        return $result_agencia;
    }

}

?>