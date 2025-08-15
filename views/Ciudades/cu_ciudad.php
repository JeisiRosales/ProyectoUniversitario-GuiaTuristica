<?php
if (isset($_SESSION['User']))
{ 

  $router = new Router();
  $action = $router->getAction();
  $id = $router->getId();
  $des_ciudad = "";



  if  ($action == "IngresarCiudad") // Es porque viene por insercion
  {
       $TipoOperacion = "Ingresar";
       $direccionamiento = SERVERURL . "Ciudades/IngresarCiudad1";
       $cod_ciudad = "";
       $des_ciudad = "";
       $cod_estado = "";
       
       
       require_once('controllers/CiudadesController.php');
       $controller= new CiudadesController();
       $result_ciudad= $controller->BuscarUltimoCiudad();
       $numrows = mysqli_num_rows($result_ciudad);
       while ($numrows = mysqli_fetch_array($result_ciudad))
       { 
          $cod_ciudad = $numrows["identific"] + 1; 
       }

   }elseif (($action == "ActualizarCiudad") OR ($action == "BorrarCiudad")) // Es porque viene por actualizacion
   {

       if ($action == "ActualizarCiudad") {
           $TipoOperacion = "Actualizar";
           $direccionamiento = SERVERURL . "Ciudades/ActualizarCiudad1";
          }

       if ($action == "BorrarCiudad") {
            $TipoOperacion = "Borrar";
            $direccionamiento = SERVERURL . "Ciudades/BorrarCiudad1";
       }
  
          $cod_ciudad = $id;

          require_once('controllers/CiudadesController.php');
          $controller = new CiudadesController();
          $result_ciudad = $controller->BuscarCiudadById($cod_ciudad);

          if (!empty($result_ciudad) && $result_ciudad !== null) {


                    $numrows = mysqli_num_rows($result_ciudad);
                    if ($numrows != 0)
                    {
                        while ($numrows = mysqli_fetch_array($result_ciudad))
                        {
                                $cod_ciudad = $numrows["Cod_Ciudad"];
                                $des_ciudad = $numrows['Des_Ciudad'];
                                $cod_estado = $numrows['Cod_Estado'];
                            }
                    }
            }
   
   }elseif (($action == "IngresarCiudad1") OR ($action == "ActualizarCiudad1") OR ($action == "BorrarCiudad1"))// Es porque hubo un error al ingresar o actualizar y hay que mantener los datos en pantalla
   {
      if (isset($_POST['des_ciudad']) ==1) 
      {    
            $cod_ciudad = $_POST['cod_ciudad'];
            $des_ciudad = $_POST['des_ciudad'];
            $cod_estado = $_POST['cod_estado'];
       }
  
      if ($action == "IngresarCiudad1") { // Cuando el error ocurrion cuando ingresaba
      
          $TipoOperacion = "Ingresar";
          $direccionamiento = SERVERURL . "Ciudades/IngresarCiudad1";

      }elseif ($action == "ActualizarCiudad1") { // Cuando el error ocurrio cuando actualizaba

          $TipoOperacion = "Actualizar";
          $direccionamiento = SERVERURL . "Ciudades/ActualizarCiudad1";

      }elseif ($action == "BorrarCiudad1") { // Cuando el error ocurrio cuando eliminaba
          $TipoOperacion = "Borrar";
          $direccionamiento = SERVERURL . "Ciudades/BorrarCiudad1";
         
      }
    }

?>

<div class="panel-heading" style =" background-color: #2F5597">
        <div class = "row">
            <div class = "col-12" style = "color : white">
                <h4> <b>Domicilio / <?php echo $TipoOperacion;?> Ciudad</b></h4>
            </div>
        </div>  
</div>

 <div class="page-content"><!-- 3 --> 
    <form action= "<?php echo $direccionamiento?>" method = "POST"> <!-- 3 -->
           <div class="alert" style = "background-color: #F9F9F9 ">
           <br> <br>
            <div class ="row"> <!-- 6 -->
                 <div class="col-4">
                       
                       <label for="busqueda" align="right" size="40"> <b>Id. Ciudad: </b> </label> 
                       <input class="form-control mr-sm-2" aria-label="Search" title= "Sólo números son permitidos. Tamaño máximo 2 caracteres" type="" align="left" placeholder = "<?php echo $cod_ciudad; ?>" maxlength = "5" id="busqueda" readonly=readonly name="cod_ciudad" required pattern="[1-9]{1,2}" value= "<?php echo $cod_ciudad; ?>" /> <br>
                  </div>

                <div class="col-8">
                       <label for="busqueda" align="right" size="40"> <b>Estado: </b> </label> 

                       <select class="form-control" name="cod_estado" required> 
                             <option value ="">Elija una opcion</option>
                             <?php
                             require_once('controllers/EstadosController.php');
                             $controller= new EstadosController();
                             $result_estado= $controller->ListarEstadosByNombre();

                             while ($numrow = mysqli_fetch_array($result_estado))
                             {
                                    if ($cod_estado == $numrow['Cod_Estado']) 
                                    {?>
                                        <option selected = "selected" value="<?php echo $numrow['Cod_Estado']; ?>"><?php echo $numrow['Des_Estado']; ?> </option>
                                    <?php 
                                    }elseif ($cod_estado !== $numrow['Cod_Estado'])  {?>
                                      <option value="<?php echo $numrow['Cod_Estado']; ?>"><?php echo $numrow['Des_Estado']; ?>
                                    </option>
                                    <?php
                                  }
                         
                         
                              }
                              ?>
                      </select> <br>
                      	
 	              </div> <!-- 6 -->

          </div>

          <div class = "row">
                      <div class="col-12">
                            <label for="busqueda" align="right" size="40"> <b>Nombre de la Ciudad:</b> </label>    
                          <input class="form-control mr-sm-2" title= "Solo letras son permitidas. Tamaño máximo 52 caracteres" type="search" align="right" size="52" placeholder = "<?php echo $des_ciudad;?>" maxlength = "52" id="busqueda" name="des_ciudad" value = "<?php echo $des_ciudad;?>" required pattern="[A-Za-záéíóúÁÉÍÓÚ ]{4,52}"/>  <br>
                      </div> 
          </div>
          <br> <br>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><?php echo $TipoOperacion?></button> 
          </div>
      </form>
</div>

<?php


}else 
{
    require_once('views/Ciudades/listarciudades.php');
}
?>