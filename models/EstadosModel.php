<?php 

class EstadosModel
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
	

	public static function ListarEstados(){
		$sql_Estado = "SELECT * FROM tbl_estado ORDER BY Cod_Estado asc";
        $result_Estado = EstadosModel::Get_Data($sql_Estado);
        return $result_Estado;
	}

	public static function ListarEstadosByNombre(){
		$sql_Estado = "SELECT * FROM tbl_estado ORDER BY Des_Estado asc";
        $result_Estado = EstadosModel::Get_Data($sql_Estado);
        return $result_Estado;
	}

    // Para la insersión

	public static function BuscarUltimoEstado(){
		$sql_Estado = "SELECT (max(Cod_Estado)) as identific FROM tbl_estado ORDER BY Cod_Estado asc";
		$result_Estado = EstadosModel::Get_Data($sql_Estado);
  		return $result_Estado;
	}

	public static function IngresarEstado2 ($id_estado, $estado){
		$sql_Estado = "INSERT INTO tbl_estado (Cod_Estado, Des_Estado) VALUES ($id_estado, '$estado')";
		$result_Estado = EstadosModel::Update_Data($sql_Estado);
  		return $result_Estado;
	}

	// Para la actualización 

	public static function BuscarEstadoById($id_estado){
    	$sql_Estado = "SELECT * FROM tbl_estado WHERE Cod_Estado = $id_estado";
		$result_Estado = EstadosModel::Get_Data($sql_Estado);
  		return $result_Estado;
	}

	public static function ActualizarEstado2 ($id_estado, $estado){
		$sql_Estado= "UPDATE tbl_estado SET Des_Estado = '$estado' WHERE Cod_Estado = $id_estado" ;
		$result_Estado = EstadosModel::Update_Data($sql_Estado);
  		return $result_Estado;
	}
	
	// Para eliminar

	public static function BorrarEstado2 ($id_estado){
		
		$sql_Estado = "DELETE FROM tbl_estado WHERE Cod_Estado = $id_estado" ;
		$result_Estado = EstadosModel::Update_Data($sql_Estado);
  		return $result_Estado;
	}
}

?>