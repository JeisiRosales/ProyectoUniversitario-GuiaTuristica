<?php 

class AgenciasServiciosController
{
    function construct(){

    }
    //ASIGNAR
    //Muestra la vista del formulario de asignar agencia a servicio
    function IngresarAgenciaServicio(){
        require_once('views/AgenciasServicios/cu_AgenciasServicios.php');
    }

    function IngresarAgenciaServicio1(){
        require_once('views/AgenciasServicios/cu_AgenciasServicios1.php');
    }

    //Ingresar relacion AgenciaServicio a la BD
    static public function IngresarAgenciaServicio2($id_agencia, $id_servicio){
        require_once('models/AgenciasServiciosModel.php');
        $result = AgenciasServiciosModel::IngresarAgenciaServicio($id_agencia, $id_servicio);
        return $result;
    }

    /* Consultar servicios de una agencia (para mostrar en detalle de agencia)
    static public function ListarAgenciaPorServicio($id_agencia) {
        require_once('models/AgenciaServicioModel.php');
        return AgenciaServicioModel::ListarServiciosPorAgencia($id_agencia);
    }
    */
}

?>