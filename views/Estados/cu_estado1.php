<?php


if (isset($_SESSION['User']) == 1 and (isset($_POST['cod_estado']) == 1))
{ 

	$router = new Router();
    $action = $router->getAction();
		
	$cod_estado = $_POST['cod_estado'];
	$des_estado = $_POST['des_estado'];
	
	require_once('controllers/EstadosController.php');
    $controller= new EstadosController();

    if ($action == "IngresarEstado1") {
    	    $result_Estado= $controller->IngresarEstado2($cod_estado, $des_estado);
	}elseif ($action == "ActualizarEstado1") {
			$result_Estado= $controller->ActualizarEstado2($cod_estado, $des_estado);
	}elseif ($action == "BorrarEstado1") {
			$result_Estado= $controller->BorrarEstado2($cod_estado);
	}

	
	
	if ($result_Estado == false) // la consulta no fue exitosa 
	{   ?>
		<div class="my-1"></div>
		<div class="alert alert-warning alert-dismissable" align="justify">
		        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	   			<span aria-hidden="true">&times;</span>
	   			</button>
				<label for="busqueda" align="right"> <strong>Mensaje de Advertencia</strong><br> 
	   			<p style="font-size:12px; color:black"><?php echo MSG_ADVERTENCIA_CU?> </p> </label> <br>
	   			
	   	</div>
	<?php 
	require_once('views/Estados/cu_estado.php');
  }
    else
	{   ?>
		<div class="my-1"></div>
		 <div class="alert alert-success" align = "justify">
		        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span> 
                </button>
                <label for="busqueda" align="right"> <strong>Mensaje de Éxito</strong> <br> 
                <p style="font-size:12px; color:black">El registro del Estado <?php echo MSG_EXITO_CU?></p> </label> <br>
                
          </div>
	<?php
	require_once('views/Estados/listarestados.php');
	}
    
    
}else{
    require_once('views/Estados/listarestados.php');
}

?>  
