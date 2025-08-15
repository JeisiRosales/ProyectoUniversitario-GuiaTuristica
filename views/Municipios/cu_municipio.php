<?php
if (isset($_SESSION['User']))
{ 
  
  $router = new Router();
  $action = $router->getAction();
  $id = $router->getId();
  $des_municipio = "";


  if  ($action == "IngresarMunicipio") // Es porque viene por insercion
  {
       $TipoOperacion = "Ingresar";
       $direccionamiento = SERVERURL . "Municipios/IngresarMunicipio1";
       $cod_municipio = "";
       $des_municipio = "";
       $cod_estado = "";
       
       
       require_once('controllers/MunicipiosController.php');
       $controller= new MunicipiosController();
       $result_municipio= $controller->BuscarUltimoMunicipio();
       $numrows = mysqli_num_rows($result_municipio);
       while ($numrows = mysqli_fetch_array($result_municipio))
       { 
          $cod_municipio = $numrows["identific"] + 1; 
       }

   }elseif (($action == "ActualizarMunicipio") OR ($action == "BorrarMunicipio")) // Es porque viene por actualizacion
   {

          if ($action == "ActualizarMunicipio") {
             $TipoOperacion = "Actualizar";
             $direccionamiento = SERVERURL . "Municipios/ActualizarMunicipio1";
          }

          if ($action == "BorrarMunicipio") {
              $TipoOperacion = "Borrar";
              $direccionamiento = SERVERURL . "Municipios/BorrarMunicipio1";
          }
       
          $cod_municipio = $id;



          require_once('controllers/MunicipiosController.php');
          $controller = new MunicipiosController();
          $result_municipio = $controller->BuscarMunicipioById($cod_municipio);
          if (!empty($result_municipio) && $result_municipio !== null) {
                $numrows = mysqli_num_rows($result_municipio);
                if ($numrows != 0)
                {
                    while ($numrows = mysqli_fetch_array($result_municipio))
                    {
                            $cod_municipio = $numrows["Cod_Municipio"];
                            $des_municipio = $numrows['Des_Municipio'];
                            $cod_estado = $numrows['Cod_Estado'];
                        }
                }
          }
   
   }elseif (($action == "IngresarMunicipio1") OR ($action == "ActualizarMunicipio1") OR ($action == "BorrarMunicipio1")) // Es porque hubo un error al ingresar o actualizar y hay que mantener los datos en pantalla
   {
      if (isset($_POST['des_municipio']) ==1) 
      {    
            $cod_municipio = $_POST['cod_municipio'];
            $des_municipio = $_POST['des_municipio'];
            $cod_estado = $_POST['cod_estado'];
       }
  
      if ($action == "IngresarMunicipio1") { // Cuando el error ocurrion cuando ingresaba
      
          $TipoOperacion = "Ingresar";
          $direccionamiento = SERVERURL . "Municipios/IngresarMunicipio1";

      }elseif ($action == "ActualizarMunicipio1") { // Cuando el error ocurrio cuando actualizaba

          $TipoOperacion = "Actualizar";
          $direccionamiento = SERVERURL . "Municipios/ActualizarMunicipio1";
      
      }elseif ($action == "BorrarMunicipio1") { // Cuando el error ocurrio cuando eliminaba
          $TipoOperacion = "Borrar";
          $direccionamiento = SERVERURL . "Municipios/BorrarMunicipio1";
      }
   }

?>

 <div class="page-content"><!-- 3 --> 
 <div class="panel-heading" style =" background-color: #2F5597">
        <div class = "row">
            <div class = "col-12" style = "color : white">
                <h4> <b>Domicilio / <?php echo $TipoOperacion;?> Municipio</b></h4>
            </div>
        </div>  
</div>
    <form action= "<?php echo $direccionamiento?>" method = "POST"> <!-- 3 -->
       

       <div class="alert" style = "background-color: #F9F9F9 ">
       <br> <br>
            <div class ="row"> <!-- 6 -->
              <div class="col-6">
                       
                       <label for="busqueda" align="right" size="40"> <b>Id. Municipio: </b> </label> 

                       <input class="form-control mr-sm-2" aria-label="Search" title= "Sólo números son permitidos. Tamaño máximo 2 caracteres" type="" align="left" placeholder = "<?php echo $cod_municipio; ?>" maxlength = "5" id="busqueda" readonly=readonly name="cod_municipio" required pattern="[1-9]{1,2}" value= "<?php echo $cod_municipio; ?>" /> <br>
  
                      
                </div>

   	           <div class="col-6">

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
  
                      <label for="busqueda" align="right" size="40"> <b>Nombre del Municipio:</b> </label>    
                      <input class="form-control mr-sm-2" title= "Solo letras son permitidas. Tamaño máximo 100 caracteres" type="search" align="right" size="100" placeholder = "<?php echo $des_municipio;?>" maxlength = "52" id="des_municipio" name="des_municipio" value = "<?php echo $des_municipio;?>" required pattern="[A-Za-záéíóúÁÉÍÓÚ ]{4,100}"/>  <br>
                      
                        
                </div> <!-- 6 -->
          </div>
           <br> <br>
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><?php echo $TipoOperacion?></button> 
          </div>
      </form>
</div>

<?php

}else 
{
    require_once('views/Municipios/listarmunicipio.php');
}
?>