<?php

class CiudadesController
{

	function __construct()
	{
		
	}

 	function ListarCiudades(){
		 require_once('views/Ciudades/listarciudades.php');
	}

	static public function ListarCiudades1(){
	   	 require_once('models/CiudadesModel.php');
         $result_Listar= CiudadesModel::ListarCiudades();
         return $result_Listar;
	}
  
  // Para insertar

    static public function BuscarUltimoCiudad(){
    	 require_once('models/CiudadesModel.php');
         $result_Listar = CiudadesModel::BuscarUltimoCiudad();
         return $result_Listar;
	}

	function IngresarCiudad(){
		 require_once('views/Ciudades/cu_ciudad.php');
	}

	function IngresarCiudad1(){
		 require_once('views/Ciudades/cu_ciudad1.php');
	}

	static public function IngresarCiudad2($id_ciudad,$ciudad,$id_estado){
	  	 require_once('models/CiudadesModel.php');
         $result_Listar= CiudadesModel::IngresarCiudad2($id_ciudad,$ciudad,$id_estado);
         return $result_Listar;
	}

	// Para actualizar 
    static public function BuscarCiudadById($id){
    	 require_once('models/CiudadesModel.php');
         $result_Listar = CiudadesModel::BuscarCiudadById($id);
         return $result_Listar;
	}

	static public function BuscarCiudadesByEstado($id_estado){
    	 require_once('models/CiudadesModel.php');
         $result_Listar = CiudadesModel::BuscarCiudadesByEstado($id_estado);
         return $result_Listar;
	}

	function ActualizarCiudad(){
		 require_once('views/Ciudades/cu_ciudad.php');
	}

	function ActualizarCiudad1(){
		 require_once('views/Ciudades/cu_ciudad1.php');
	}

	static public function ActualizarCiudad2($id_ciudad, $ciudad, $id_estado){
	  	 require_once('models/CiudadesModel.php');
         $result_Listar= CiudadesModel::ActualizarCiudad2($id_ciudad, $ciudad, $id_estado);
         return $result_Listar;
	}

	// Para eliminar

	function BorrarCiudad(){
		require_once('views/Ciudades/cu_ciudad.php');
	}

	function BorrarCiudad1(){
		 require_once('views/Ciudades/cu_ciudad1.php');
	}

	static public function BorrarCiudad2($id_ciudad){
		
		require_once('models/CiudadesModel.php');
        $result_Listar= CiudadesModel::BorrarCiudad2($id_ciudad);
        return $result_Listar;
	}
  

}

?>