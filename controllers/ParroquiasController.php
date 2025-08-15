<?php

class ParroquiasController
{

	function __construct()
	{
		
	}

 	function ListarParroquias(){
		 require_once('views/Parroquias/listarparroquias.php');
	}

	static public function ListarParroquias1(){
	   	 require_once('models/ParroquiasModel.php');
         $result_Listar= ParroquiasModel::ListarParroquias();
         return $result_Listar;
	}


  // Para insertar

	
    static public function BuscarUltimoParroquia(){
    	 require_once('models/ParroquiasModel.php');
         $result_Listar = ParroquiasModel::BuscarUltimoParroquia();
         return $result_Listar;
	}

	function IngresarParroquia(){
		 require_once('views/Parroquias/cu_parroquia.php');
	}

	function IngresarParroquia1(){
		 require_once('views/Parroquias/cu_parroquia1.php');
	}

	static public function IngresarParroquia2($id_Parroquia,$Parroquia,$id_municipio){
	  	 require_once('models/ParroquiasModel.php');
         $result_Listar= ParroquiasModel::IngresarParroquia2($id_Parroquia,$Parroquia,$id_municipio);
         return $result_Listar;
	}

	// Para actualizar 

	static public function BuscarParroquiasByMunicipio($id_municipio){
		 require_once('models/ParroquiasModel.php');
         $result_Listar = ParroquiasModel::BuscarParroquiasByMunicipio($id_municipio);
         return $result_Listar;
	}  
	
    static public function BuscarParroquiaById($id){
    	 require_once('models/ParroquiasModel.php');
         $result_Listar = ParroquiasModel::BuscarParroquiaById($id);
         return $result_Listar;
	}

	function ActualizarParroquia(){
		 require_once('views/Parroquias/cu_parroquia.php');
	}

	function ActualizarParroquia1(){
		 require_once('views/Parroquias/cu_parroquia1.php');
	}

	static public function ActualizarParroquia2($id_Parroquia,$Parroquia,$id_municipio){
	  	 require_once('models/ParroquiasModel.php');
         $result_Listar= ParroquiasModel::ActualizarParroquia2($id_Parroquia,$Parroquia,$id_municipio);
         return $result_Listar;
	}

	// Para eliminar

	function BorrarParroquia(){
		require_once('views/Parroquias/cu_parroquia.php');
	}

	function BorrarParroquia1(){
		 require_once('views/Parroquias/cu_parroquia1.php');
	}

	static public function BorrarParroquia2($id_parroquia){
		require_once('models/ParroquiasModel.php');
        $result_Listar= ParroquiasModel::BorrarParroquia2($id_parroquia);
        return $result_Listar;
	}

  

}

?>