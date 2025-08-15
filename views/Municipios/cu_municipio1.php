<?php

if (isset($_SESSION['User']) == 1)
{ 

	$router = new Router();
    $action = $router->getAction();

   	$cod_municipio = $_POST['cod_municipio'];
   	$cod_estado = $_POST['cod_estado'];
	$des_municipio = $_POST['des_municipio'];

	require_once('controllers/MunicipiosController.php');
    $controller= new MunicipiosController();

    if ($action == "IngresarMunicipio1") {
    	    $result_Municipio= $controller->IngresarMunicipio2($cod_municipio, $des_municipio, $cod_estado);
	}elseif ($action == "ActualizarMunicipio1") {
	 		$result_Municipio= $controller->ActualizarMunicipio2($cod_municipio, $des_municipio, $cod_estado);
	}elseif ($action == "BorrarMunicipio1") {
			$result_Municipio= $controller->BorrarMunicipio2($cod_municipio);
	}

	
	if ($result_Municipio == false) // la consulta no fue exitosa 
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
	 require_once('views/Municipios/cu_municipio.php');
    }else
	{   ?>
		<div class="my-1"></div>
		 <div class="alert alert-success" align = "justify">
		        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span> 
                </button>
                <label for="busqueda" align="right"> <strong>Mensaje de Éxito</strong> <br> 
                  <p style="font-size:12px; color:black">El registro del Muncipio  <?php echo MSG_EXITO_CU?></p> </label> <br>
                
          </div>
	<?php
	 require_once('views/Municipios/listarmunicipios.php');
	}
    
   
}else{
     require_once('views/Municipios/listarmunicipios.php');
}

?>  
