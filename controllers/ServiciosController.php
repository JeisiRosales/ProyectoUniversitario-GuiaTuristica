<?php

class ServiciosController
{
    function __construct(){

    }

    //Mostrar la vista del listado de servicios
    function ListarServicios(){
        require_once('views/Servicios/listarservicios.php');
    }

    //Obtener los servicios desde el model
    static public function ListarServicios1(){
        require_once('models/ServiciosModel.php');
        $result = ServiciosModel::ListarServicios();
        return $result;
    }

    //Buscar el ultimo servicio registrado (ID)
    static public function BuscarUltimoServicio(){
        require_once('models/ServiciosModel.php');
        $result = ServiciosModel::BuscarUltimoServicio();
        return $result;
    }

    //Buscar servicio por ID
    static public function BuscarServicioById($id){
        require_once('models/ServiciosModel.php');
        $result = ServiciosModel::BuscarServicioById($id);
        return $result;
    }

    //INGRESAR
    //Mostrar vista para ingresar un nuevo servicio
    function IngresarServicio(){
        require_once('views/Servicios/cu_servicio.php');
    }

    function IngresarServicio1(){
        require_once('views/Servicios/cu_servicio1.php');
    }

    //Ingresar servicio a la BD
    static public function IngresarServicio2($id_servicio, $nombre_servicio){
        require_once('models/ServiciosModel.php');
        $result = ServiciosModel::IngresarServicio($id_servicio, $nombre_servicio);
        return $result;
    }

    //ACTUALIZAR
    //Mostrar vista para actualizar un servicio
    function ActualizarServicio(){
        require_once('views/Servicios/cu_servicio.php');
    }

    function ActualizarServicio1(){
        require_once('views/Servicios/cu_servicio1.php');
    }

    //Actualizar el servicio en la BD
    static public function ActualizarServicio2($id_servicio, $nombre_servicio){
        require_once('models/ServiciosModel.php');
        $result = ServiciosModel::ActualizarServicio($id_servicio, $nombre_servicio);
        return $result;
    }

    //ELIMINAR
    //Mostrar vista para eliminar
    function BorrarServicio(){
        require_once('views/Servicios/cu_servicio.php');
    }

    function BorrarServicio1(){
        require_once('views/Servicios/cu_servicio1.php');
    }

    //Borrar servicio de la BD
    static public function BorrarServicio2($id){
        require_once('models/ServiciosModel.php');
        $result = ServiciosModel::BorrarServicio($id);
        return $result;
    }
}

?>