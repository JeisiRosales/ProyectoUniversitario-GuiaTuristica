<?php

if (isset($_SESSION['User']) == 1)
{ 

	$router = new Router();
    $action = $router->getAction();

   	$cod_ciudad = $_POST['cod_ciudad'];
   	$cod_estado = $_POST['cod_estado'];
	$des_ciudad = $_POST['des_ciudad'];
	
	require_once('controllers/CiudadesController.php');
    $controller= new CiudadesController();

    if ($action == "IngresarCiudad1") {
    	    $result_Ciudad= $controller->IngresarCiudad2($cod_ciudad, $des_ciudad, $cod_estado);
	}elseif ($action == "ActualizarCiudad1") {
			$result_Ciudad= $controller->ActualizarCiudad2($cod_ciudad, $des_ciudad, $cod_estado);
	}elseif ($action == "BorrarCiudad1") {
			$result_Ciudad= $controller->BorrarCiudad2($cod_ciudad);
	}

	
	if ($result_Ciudad == false) // la consulta no fue exitosa 
	{   ?>
		<div class="my-1"></div>
		<div class="alert alert-warning alert-dismissable" align = "justify">
		        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	   			<span aria-hidden="true">&times;</span>
	   			</button>
				<label for="busqueda" align="right"> <strong>Mensaje de Advertencia</strong><br> 
	     		<p style="font-size:12px; color:black"><?php echo MSG_ADVERTENCIA_CU?> </p> </label> <br>
	   	</div>
	<?php 
	   require_once('views/Ciudades/cu_ciudad.php');
    }else
	{   ?>
		<div class="my-1"></div>
		 <div class="alert alert-success" align = "justify">
		        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span> 
                </button>
                <label for="busqueda" align="right"> <strong>Mensaje de Éxito</strong> <br> 
                <p style="font-size:12px; color:black">El registro de la Ciudad <?php echo MSG_EXITO_CU?></p> </label> <br>
                
          </div>
	<?php
	   require_once('views/Ciudades/listarciudades.php');
	}
    
 
}else{
    require_once('views/Ciudades/listarciudades.php');
}

?>  