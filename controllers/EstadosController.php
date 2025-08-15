<?php

class EstadosController
{

	function __construct()
	{
		
	}

 	function ListarEstados(){
		 require_once('views/Estados/listarestados.php');
	}

	static public function ListarEstados1(){
	   	 require_once('models/EstadosModel.php');
         $result_Listar= EstadosModel::ListarEstados();
         return $result_Listar;
	}
  
  // Para insertar

    static public function BuscarUltimoEstado(){
    	 require_once('models/EstadosModel.php');
         $result_Listar = EstadosModel::BuscarUltimoEstado();
         return $result_Listar;
	}

	function IngresarEstado(){
		 require_once('views/Estados/cu_estado.php');
	}

	function IngresarEstado1(){
		 require_once('views/Estados/cu_estado1.php');
	}

	static public function IngresarEstado2($id_Estado,$Estado){
	  	 require_once('models/EstadosModel.php');
         $result_Listar= EstadosModel::IngresarEstado2($id_Estado,$Estado);
         return $result_Listar;
	}

	// Para actualizar 

	static public function ListarEstadosByNombre(){
	   	 require_once('models/EstadosModel.php');
         $result_Listar= EstadosModel::ListarEstadosByNombre();
         return $result_Listar;
	}

    static public function BuscarEstadoById($id){
    	 require_once('models/EstadosModel.php');
         $result_Listar = EstadosModel::BuscarEstadoById($id);
         return $result_Listar;
	}

	function ActualizarEstado(){
		 require_once('views/Estados/cu_estado.php');
	}

	function ActualizarEstado1(){
		 require_once('views/Estados/cu_estado1.php');
	}

	static public function ActualizarEstado2($id_Estado,$Estado){
	  	 require_once('models/EstadosModel.php');
         $result_Listar= EstadosModel::ActualizarEstado2($id_Estado,$Estado);
         return $result_Listar;
	}
  
  // Para eliminar

	function BorrarEstado(){
		require_once('views/Estados/cu_estado.php');
	}

	function BorrarEstado1(){
		 require_once('views/Estados/cu_estado1.php');
	}

	static public function BorrarEstado2($id_estado){
		require_once('models/EstadosModel.php');
        $result_Listar= EstadosModel::BorrarEstado2($id_estado);
        return $result_Listar;
	}

}

?>