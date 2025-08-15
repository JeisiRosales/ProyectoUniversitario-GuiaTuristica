<?php

class MunicipiosController
{

	function __construct()
	{
		
	}

 	function ListarMunicipios(){
		 require_once('views/Municipios/listarmunicipios.php');
	}

	static public function ListarMunicipios1(){
	   	 require_once('models/MunicipiosModel.php');
         $result_Listar= MunicipiosModel::ListarMunicipios();
         return $result_Listar;
	}
	
	static public function ListarMunicipioByNombre(){
	   	 require_once('models/MunicipiosModel.php');
         $result_Listar= MunicipiosModel::ListarMunicipioByNombre();
         return $result_Listar;
	}

    // Para insertar

    static public function BuscarUltimoMunicipio(){
    	 require_once('models/MunicipiosModel.php');
         $result_Listar = MunicipiosModel::BuscarUltimoMunicipio();
         return $result_Listar;
	}

	function IngresarMunicipio(){
		 require_once('views/Municipios/cu_municipio.php');
	}

	function IngresarMunicipio1(){
		 require_once('views/Municipios/cu_municipio1.php');
	}

	static public function IngresarMunicipio2($id_Municipio,$Municipio,$id_estado){
	  	 require_once('models/MunicipiosModel.php');
         $result_Listar= MunicipiosModel::IngresarMunicipios2($id_Municipio,$Municipio,$id_estado);
         return $result_Listar;
	}

	// Para actualizar 

    static public function BuscarMunicipioById($id){
    	 require_once('models/MunicipiosModel.php');
         $result_Listar = MunicipiosModel::BuscarMunicipioById($id);
         return $result_Listar;
	}

	static public function BuscarMunicipiosByEstado($id_estado){
    	 require_once('models/MunicipiosModel.php');
         $result_Listar = MunicipiosModel::BuscarMunicipiosByEstado($id_estado);
         return $result_Listar;
	}

	function ActualizarMunicipio(){
		 require_once('views/Municipios/cu_municipio.php');
	}

	function ActualizarMunicipio1(){
		 require_once('views/Municipios/cu_municipio1.php');
	}

	static public function ActualizarMunicipio2($id_Municipio,$Municipio,$id_estado){
	  	 require_once('models/MunicipiosModel.php');
         $result_Listar= MunicipiosModel::ActualizarMunicipio2($id_Municipio,$Municipio,$id_estado);
         return $result_Listar;
	}

	// Para eliminar

	function BorrarMunicipio(){
		require_once('views/Municipios/cu_municipio.php');
	}

	function BorrarMunicipio1(){
		 require_once('views/Municipios/cu_municipio1.php');
	}

	static public function BorrarMunicipio2($id_municipio){
		require_once('models/MunicipiosModel.php');
        $result_Listar= MunicipiosModel::BorrarMunicipio2($id_municipio);
        return $result_Listar;
	}

}

?>