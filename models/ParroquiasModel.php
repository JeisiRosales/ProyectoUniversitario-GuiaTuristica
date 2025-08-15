<?php 

class ParroquiasModel
{
	
	function __construct()
	{
	
	}

	// FUNCIONES GENERICAS PARA CONSULTAR Y ACTUALIZAR (INSERTAR, MODIFICAR Y ELIMINAR)

	public static function Get_Data($sql){
		include_once('core/Conectar.php');
		$conexion=Conectar::conexion();

		try {
			!$result = mysqli_query($conexion, $sql);
  		
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

	
    // para el resto de las operaciones
	

	public static function ListarParroquias(){
		$sql_parroquia = "SELECT * FROM tbl_parroquia AS P, tbl_municipio AS M, tbl_estado as E WHERE M.Cod_Municipio = P.Cod_Municipio AND M.Cod_Estado = E.Cod_Estado";
        $result_parroquia = ParroquiasModel::Get_Data($sql_parroquia);
        return $result_parroquia;
	}

    // Para la insersión

	public static function BuscarUltimoParroquia(){

		$sql_parroquia = "SELECT (max(Cod_Parroquia)) as identific FROM tbl_parroquia ORDER BY Cod_Parroquia asc";
		$result_parroquia = ParroquiasModel::Get_Data($sql_parroquia);
  		return $result_parroquia;
	}

	public static function IngresarParroquia2 ($id_parroquia, $parroquia, $id_municipio){
		$sql_parroquia = "INSERT INTO tbl_parroquia (Cod_Parroquia, Des_Parroquia, Cod_Municipio) VALUES ($id_parroquia, '$parroquia', $id_municipio)";
		$result_parroquia = ParroquiasModel::Update_Data($sql_parroquia);
  		return $result_parroquia;
	}

	// Para la actualización 

	public static function BuscarParroquiasByMunicipio($id_municipio){
    	$sql_parroquia = "SELECT * FROM tbl_parroquia WHERE Cod_Municipio = $id_municipio";
		$result_parroquia = ParroquiasModel::Get_Data($sql_parroquia);
  		return $result_parroquia;
	}


	public static function BuscarParroquiaById($id_parroquia){
    	$sql_parroquia = "SELECT * FROM tbl_parroquia WHERE Cod_Parroquia = $id_parroquia";
		$result_parroquia = ParroquiasModel::Get_Data($sql_parroquia);
  		return $result_parroquia;
	}

	public static function ActualizarParroquia2 ($id_parroquia, $parroquia, $id_municipio){
		$sql_parroquia= "UPDATE tbl_parroquia SET Des_Parroquia = '$parroquia', Cod_Municipio = $id_municipio WHERE Cod_Parroquia = $id_parroquia" ;
		$result_parroquia = ParroquiasModel::Update_Data($sql_parroquia);
  		return $result_parroquia;
	}

	// Para eliminar

	public static function BorrarParroquia2 ($id_parroquia){
		
		$sql_parroquia = "DELETE FROM tbl_parroquia WHERE Cod_Parroquia = $id_parroquia" ;
		$result_Estado = ParroquiasModel::Update_Data($sql_parroquia);
  		return $result_Estado;
	}
	
}

?>