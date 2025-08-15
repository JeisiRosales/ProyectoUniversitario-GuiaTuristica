<?php 

class MunicipiosModel
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
	

	public static function ListarMunicipios(){
		$sql_Municipio = "SELECT Cod_Municipio, Des_Estado, Des_Municipio FROM tbl_municipio AS M, tbl_estado AS E WHERE M.Cod_Estado = E.Cod_Estado";
        $result_Municipio = MunicipiosModel::Get_Data($sql_Municipio);
        return $result_Municipio;
	}

	// public static function ListarMunicipioByNombre(){
	// 	$sql_Municipio = "SELECT * FROM tbl_mun ORDER BY Descrip asc";
 //        $result_Municipio = MunicipiosModel::Get_Data($sql_Municipio);
 //        return $result_Municipio;
	// }

	public static function BuscarMunicipiosByEstado($id_estado){
		$sql_Municipio = "SELECT * FROM tbl_municipio WHERE Cod_Estado = $id_estado";
		$result_Municipio = MunicipiosModel::Get_Data($sql_Municipio);
  		return $result_Municipio;
	}

    // Para la insersión

	public static function BuscarUltimoMunicipio(){

		$sql_Municipio = "SELECT (max(Cod_Municipio)) as identific FROM tbl_municipio ORDER BY Cod_Municipio asc";
		$result_Municipio = MunicipiosModel::Get_Data($sql_Municipio);
  		return $result_Municipio;
	}

	public static function IngresarMunicipios2 ($id_Municipio, $Municipio, $id_estado){
		$sql_Municipio = "INSERT INTO tbl_municipio (Cod_Municipio, Des_Municipio, Cod_Estado) VALUES ($id_Municipio, '$Municipio', $id_estado)";
		$result_Municipio = MunicipiosModel::Update_Data($sql_Municipio);
  		return $result_Municipio;
	}

	// Para la actualización 

	public static function BuscarMunicipioById($id_Municipio){
    	$sql_Municipio = "SELECT * FROM tbl_municipio WHERE Cod_Municipio = $id_Municipio";
		$result_Municipio = MunicipiosModel::Get_Data($sql_Municipio);
  		return $result_Municipio;
	}

	public static function ActualizarMunicipio2 ($id_Municipio, $Municipio, $id_estado){
		$sql_Municipio= "UPDATE tbl_municipio SET Des_Municipio = '$Municipio', Cod_Estado = $id_estado WHERE Cod_Municipio = $id_Municipio" ;
		$result_Municipio = MunicipiosModel::Update_Data($sql_Municipio);
  		return $result_Municipio;
	}
	
	// Para eliminar

	public static function BorrarMunicipio2 ($id_municipio){
		
		$sql_Municipio = "DELETE FROM tbl_municipio WHERE Cod_Municipio = $id_municipio" ;
		$result_Municipio = MunicipiosModel::Update_Data($sql_Municipio);
  		return $result_Municipio;
	}
}

?>