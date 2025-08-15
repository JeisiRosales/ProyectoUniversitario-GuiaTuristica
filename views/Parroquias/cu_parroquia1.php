<?php

if (isset($_SESSION['User']) == 1)
{ 
    $router = new Router();
    $action = $router->getAction();

	$cod_parroquia = $_POST['cod_parroquia'];
	$des_parroquia = $_POST['des_parroquia'];
	$cod_municipio = $_POST['cod_municipio'];

	require_once('controllers/ParroquiasController.php');
    $controller= new ParroquiasController();

    if ($action == "IngresarParroquia1") {
        $result_Parroquia= $controller->IngresarParroquia2($cod_parroquia, $des_parroquia, $cod_municipio);
	}elseif ($action == "ActualizarParroquia1") {
		$result_Parroquia= $controller->ActualizarParroquia2($cod_parroquia, $des_parroquia, $cod_municipio);
	}elseif ($action == "BorrarParroquia1") {
		$result_Parroquia= $controller->BorrarParroquia2($cod_parroquia);
	}

	
	if ($result_Parroquia == false) // la consulta no fue exitosa 
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
	  require_once('views/Parroquias/cu_parroquia.php');
    }else
	{   ?>
		<div class="my-1"></div>
		 <div class="alert alert-success" align="justify">
		        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span> 
                </button>
                <label for="busqueda" align="right"> <strong>Mensaje de Éxito</strong> <br> 
               <p style="font-size:12px; color:black">El registro de la Parroquia <?php echo MSG_EXITO_CU?></p> </label> <br>
                
          </div>
	<?php
	  require_once('views/Parroquias/listarparroquias.php');
	}
    
  
}else{
    require_once('views/Parroquias/listarparroquias.php');
}

?>  
