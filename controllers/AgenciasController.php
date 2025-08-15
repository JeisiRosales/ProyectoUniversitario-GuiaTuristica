<?php

class AgenciasController
{
    function __construct(){

    }

    //Mostrar la vista del listado de agencias
    function ListarAgencias(){
        require_once('views/Agencias/listarAgencias.php');
    }

    //Obtiene los datos del modelo
    static public function ListarAgencias1(){
        require_once('models/AgenciasModel.php');
        $result = AgenciasModel::ListarAgencias();
        return $result;
    }

    //Buscar ultima agencia
    static public function BuscarUltimaAgencia(){
        require_once('models/AgenciasModel.php');
        $result = AgenciasModel::BuscarUltimaAgencia();
        return $result;
    }

    //Buscar agencia por RIF
    static public function BuscarAgenciaByRif($rif){
        require_once('models/AgenciasModel.php');
        $result = AgenciasModel::BuscarAgenciaByRif($rif);
        return $result;
    }

    //Buscar agencia por ID
    static public function BuscarAgenciaById($id){
        require_once('models/AgenciasModel.php');
        $result = AgenciasModel::BuscarAgenciaById($id);
        return $result;
    }

    //INGRESAR
    //Mostrar vista para registrar agencia
    function IngresarAgencia(){
        require_once('views/Agencias/cu_agencia.php');
    }

    function IngresarAgencia1(){
        require_once('views/Agencias/cu_agencia1.php');
    }

    //Ingresar la agencia a la BD
    static public function IngresarAgencia2($id, $nombre, $rif, $telefono, $email, $direccion, $coor_altitud, $coord_latitud, $id_ciudad, $id_parroquia){
        require_once('models/AgenciasModel.php');
        $result = AgenciasModel::IngresarAgencias($id, $nombre, $rif, $telefono, $email, $direccion, $coor_altitud, $coord_latitud, $id_ciudad, $id_parroquia);
        return $result;
    }

    //ACTUALIZAR
    //Mostrar vista para actualizar
    function ActualizarAgencia(){
        require_once('views/Agencias/cu_agencia.php');
    }

    function ActualizarAgencia1(){
        require_once('views/Agencias/cu_agencia1.php');
    }

    //Actualizar agencia de la BD
    static public function ActualizarAgencia2($id, $nombre, $rif, $telefono, $email, $direccion, $coord_altitud, $coord_latitud, $id_ciudad, $id_parroquia){
        require_once('models/AgenciasModel.php');
        $result = AgenciasModel::ActualizarAgencias($id, $nombre, $rif, $telefono, $email, $direccion, $coord_altitud, $coord_latitud, $id_ciudad, $id_parroquia);
        return $result;
    }

    //ELIMINAR
    //Mostrar vista para eliminar
    function BorrarAgencia(){
        require_once('views/Agencias/cu_agencia.php');
    }

    function BorrarAgencia1(){
        require_once('views/Agencias/cu_agencia1.php');
    }

    //Eliminar Agencia
    static public function BorrarAgencia2($id){
        require_once('models/AgenciasModel.php');
        $result = AgenciasModel::BorrarAgencias($id);
        return $result;
    }
}

?>