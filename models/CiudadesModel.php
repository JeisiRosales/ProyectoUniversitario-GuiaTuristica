<?php 

class CiudadesModel
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
	

	public static function ListarCiudades(){
		$sql_ciudad = "SELECT * FROM tbl_ciudad AS C, tbl_estado AS E WHERE C.Cod_Estado = E.Cod_Estado";
        $result_ciudad = CiudadesModel::Get_Data($sql_ciudad);
        return $result_ciudad;
	}

    // Para la insersión

	public static function BuscarUltimociudad(){

		$sql_ciudad = "SELECT (max(Cod_Ciudad)) as identific FROM tbl_ciudad ORDER BY Cod_Ciudad asc";
		$result_ciudad = CiudadesModel::Get_Data($sql_ciudad);
  		return $result_ciudad;
	}

	public static function IngresarCiudad2 ($id_ciudad, $ciudad, $id_estado){
		$sql_ciudad = "INSERT INTO tbl_ciudad (Cod_Ciudad, Des_Ciudad, Cod_Estado) VALUES ($id_ciudad, '$ciudad', $id_estado)";
		$result_ciudad = CiudadesModel::Update_Data($sql_ciudad);
  		return $result_ciudad;
	}

	// Para la actualización 

	public static function BuscarciudadById($id_ciudad){
    	$sql_ciudad = "SELECT * FROM tbl_ciudad WHERE Cod_Ciudad = $id_ciudad";
		$result_ciudad = CiudadesModel::Get_Data($sql_ciudad);
  		return $result_ciudad;
	}

	public static function BuscarCiudadesByEstado($id_estado){
    	$sql_ciudad = "SELECT * FROM tbl_ciudad WHERE Cod_Estado = $id_estado";
		$result_ciudad = CiudadesModel::Get_Data($sql_ciudad);
  		return $result_ciudad;
	}

	public static function Actualizarciudad2 ($id_ciudad, $ciudad, $id_estado){
		$sql_ciudad= "UPDATE tbl_ciudad SET Des_Ciudad = '$ciudad', Cod_Estado = $id_estado WHERE Cod_Ciudad = $id_ciudad";
		$result_ciudad = CiudadesModel::Update_Data($sql_ciudad);
  		return $result_ciudad;
	}
	
	// Para eliminar

	public static function BorrarCiudad2 ($id_ciudad){
		$id_ciudad;
		$sql_ciudad = "DELETE FROM tbl_ciudad WHERE Cod_Ciudad = $id_ciudad" ;
		$result_ciudad = CiudadesModel::Update_Data($sql_ciudad);
  		return $result_ciudad;
	}
	
}

?>