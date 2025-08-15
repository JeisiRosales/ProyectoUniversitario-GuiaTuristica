<?php
  

if (isset($_SESSION['User']) == 1)
{ 

    $router = new Router();
    $action = $router->getAction();
    $id = $router->getId();
    $des_estado = "";


  if  ($action == "IngresarEstado") // Es porque viene por insercion
  {
       $TipoOperacion = "Ingresar";
       $direccionamiento = SERVERURL . "Estados/IngresarEstado1";
       $cod_estado = "";
       $des_estado = "";
       
       
       require_once('controllers/EstadosController.php');
       $controller= new EstadosController();
       $result_estado= $controller->BuscarUltimoEstado();
       $numrows = mysqli_num_rows($result_estado);
       while ($numrows = mysqli_fetch_array($result_estado))
       { 
          $cod_estado = $numrows["identific"] + 1; 
       }

   }elseif (($action == "ActualizarEstado") OR ($action == "BorrarEstado")) // Es porque viene por actualizacion
   {
      if ($action == "ActualizarEstado") {
           $TipoOperacion = "Actualizar";
           $direccionamiento = SERVERURL . "Estados/ActualizarEstado1";
       }

       if ($action == "BorrarEstado") {
            $TipoOperacion = "Borrar";
            $direccionamiento = SERVERURL . "Estados/BorrarEstado1";
       }      
    
          
          $cod_estado = $id;

          require_once('controllers/EstadosController.php');
          $controller = new EstadosController();
          $result_estado = $controller->BuscarEstadoById($cod_estado);
          
          if (!empty($result_estado) && $result_estado !== null) {

                    $numrows = mysqli_num_rows($result_estado);
                    if ($numrows != 0)
                    {
                        while ($numrows = mysqli_fetch_array($result_estado))
                        {
                                $cod_estado = $numrows["Cod_Estado"];
                                $des_estado = $numrows['Des_Estado'];
                            }
                    }
          }
   
    }elseif (($action == "IngresarEstado1") OR ($action == "ActualizarEstado1") OR ($action == "BorrarEstado1")) // Es porque hubo un error al ingresar o actualizar y hay que mantener los datos en pantalla
    {  
        
      if (isset($_POST['des_estado']) ==1) 
      {    
            $cod_estado = $_POST['cod_estado'];
            $des_estado = $_POST['des_estado'];
       }
  
      if ($action == "IngresarEstado1") { // Cuando el error ocurrio cuando ingresaba
      
          $TipoOperacion = "Ingresar";
          $direccionamiento = SERVERURL . "Estados/IngresarEstado1";

      }elseif ($action == "ActualizarEstado1") { // Cuando el error ocurrio cuando actualizaba

          $TipoOperacion = "Actualizar";
          $direccionamiento = SERVERURL . "Estados/ActualizarEstado1";
     
      }elseif ($action == "BorrarEstado1") { // Cuando el error ocurrio cuando eliminaba
        
          $TipoOperacion = "Borrar";
          $direccionamiento = SERVERURL . "Estados/BorrarEstado1";
           
      }
    }

?>          

<div class="panel-heading" style =" background-color: #2F5597">
        <div class = "row">
            <div class = "col-12" style = "color : white">
                <h4> <b>Domicilio / <?php echo $TipoOperacion;?>  Estado</b></h4>
            </div>
        </div>  
</div>


 <div class="page-content"><!-- 3 --> 
    <form action= "<?php echo $direccionamiento;?>" method = "POST"> <!-- 3 -->
  
            <div class="alert" style = "background-color: #F9F9F9 ">
            <br> <br>
            <div class ="row"> <!-- 6 -->
              <div class="col-3">
                       
                       <label for="busqueda" align="right" size="40"> <b>Id. Estado: </b> </label> 

                       <input class="form-control mr-sm-2" aria-label="Search" title= "Sólo números son permitidos. Tamaño máximo 2 caracteres" type="" align="left" placeholder = "<?php echo $cod_estado; ?>" maxlength = "5" id="busqueda" readonly=readonly name="cod_estado" required pattern="[1-9]{1,2}" value= "<?php echo $cod_estado; ?>" /> <br>
                </div>

   	           <div class="col-9">
 	
     			            <label for="busqueda" align="right" size="40"> <b>Nombre del Estado:</b> </label>    
                      <input class="form-control mr-sm-2" title= "Solo letras son permitidas. Tamaño máximo 52 aracteres" type="search" align="right" size="52" placeholder = "<?php echo $des_estado;?>" maxlength = "52" id="busqueda" name="des_estado" value = "<?php echo $des_estado;?>" required pattern="[A-Za-záéíóúÁÉÍÓÚ ]{4,52}"/>  <br>
                      	
 	              </div> <!-- 6 -->

          </div>
          <br> <br>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><?php echo $TipoOperacion?></button> 
          </div>
      </form>
</div>

<?php
}

else 
{
    require_once('views/Estados/listarestados.php');
}
?>