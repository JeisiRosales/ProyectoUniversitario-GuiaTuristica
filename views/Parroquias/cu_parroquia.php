<script src="<?php echo SERVERURL?>js/domicilio.js" type="text/javascript"> </script>

<?php
if (isset($_SESSION['User']) == 1)
{ 

  $router = new Router();
  $action = $router->getAction();
  $id = $router->getId();
  $des_parroquia = "";


  if  ($action == "IngresarParroquia") // Es porque viene por insercion
  {
       echo "ESTOY POR INGRESAR";
       
       $TipoOperacion = "Ingresar";
       $direccionamiento = SERVERURL . "Parroquias/IngresarParroquia1";
       $cod_parroquia = "";
       $des_parroquia = "";
       $cod_estado = "";
       $cod_municipio = "";
       
       
       require_once('controllers/ParroquiasController.php');
       $controller= new ParroquiasController();
       $result_parroquia= $controller->BuscarUltimoParroquia();
       $numrows = mysqli_num_rows($result_parroquia);
       while ($numrows = mysqli_fetch_array($result_parroquia))
       { 
          echo $cod_parroquia = $numrows["identific"] + 1; 
          
       }

   }elseif (($action == "ActualizarParroquia") OR ($action == "BorrarParroquia")) // Es porque viene por actualizacion
   {
          if ($action == "ActualizarParroquia") {
             $TipoOperacion = "Actualizar";
             $direccionamiento = SERVERURL . "Parroquias/ActualizarParroquia1";
          }

          if ($action == "BorrarParroquia") {
             $TipoOperacion = "Borrar";
             $direccionamiento = SERVERURL . "Parroquias/BorrarParroquia1";
          }
       
          $cod_parroquia = $id;

          require_once('controllers/ParroquiasController.php');
          $controller1 = new ParroquiasController();
          $result_parroquia = $controller1->BuscarParroquiaById($cod_parroquia);
          
          if (!empty($result_parroquia) && $result_parroquia !== null) {

                        $numrows = mysqli_num_rows($result_parroquia);

                        if ($numrows != 0)
                        {
                            while ($numrows = mysqli_fetch_array($result_parroquia))
                            {
                                    $cod_parroquia = $numrows["Cod_Parroquia"];
                                    $des_parroquia = $numrows['Des_Parroquia'];
                                    $cod_municipio = $numrows['Cod_Municipio'];
                                }
                                require_once('controllers/MunicipiosController.php');
                                $controller2= new MunicipiosController();
                                $result_Municipio= $controller2->BuscarMunicipioById($cod_municipio);
                                $num_Municipio =  mysqli_num_rows($result_Municipio);

                                if ($num_Municipio != 0)
                                {
                                    while ($num_Municipio = mysqli_fetch_array($result_Municipio))
                                    {
                                            $cod_estado = $num_Municipio["Cod_Estado"];
                                            $cod_municipio = $num_Municipio['Cod_Municipio'];
                                    }
                                }
                        }
            }
   
   }elseif (($action == "IngresarParroquia1") OR ($action == "ActualizarParroquia1") OR ($action == "BorrarParroquia1"))// Es porque hubo un error al ingresar o actualizar y hay que mantener los datos en pantalla
   {  
   
      if (isset($_POST['des_parroquia']) ==1) 
      {  
            $cod_parroquia = $_POST['cod_parroquia'];
            $des_parroquia = $_POST['des_parroquia'];
            $cod_estado = $_POST['cod_estado'];
            $cod_municipio = $_POST['cod_municipio'];
       }
  
      if ($action == "IngresarParroquia1") { // Cuando el error ocurrion cuando ingresaba
      
          $TipoOperacion = "Ingresar";
          $direccionamiento = SERVERURL . "Parroquias/IngresarParroquia1";

      }elseif ($action == "ActualizarParroquia1") { // Cuando el error ocurrio cuando actualizaba

          $TipoOperacion = "Actualizar";
          $direccionamiento = SERVERURL . "Parroquias/ActualizarParroquia1";
      
      }elseif ($action == "BorrarParroquia1") { // Cuando el error ocurrio cuando eliminaba
          $TipoOperacion = "Borrar";
          $direccionamiento = SERVERURL . "Parroquias/BorrarParroquia1";
      }

   }
     
?>



 <div class="page-content"><!-- 3 --> 
     <div class="panel-heading" style =" background-color: #2F5597">
            <div class = "row">
                 <div class = "col-12" style = "color : white">
                        <h4> <b>Domicilio / <?php echo $TipoOperacion;?> Parroquia</b></h4>
                 </div>
            </div>  
       </div>
   <form action= "<?php echo $direccionamiento?>" method = "POST"> <!-- 3 -->
      
       <div class="alert" style = "background-color: #F9F9F9 ">
       <br> <br>
            <div class ="row"> <!-- 6 -->
              <div class="col-4">
                       
                       <label for="busqueda" align="right" size="40"> <b>Id. Parroquia: </b> </label> 
                       <input class="form-control mr-sm-2" aria-label="Search" title= "Sólo números son permitidos. Tamaño máximo 4 caracteres" type="" align="left" placeholder = "<?php echo $cod_parroquia; ?>" readonly=readonly maxlength = "4" id="busquedareadonly" name="cod_parroquia" required pattern="[1-9]{1,4}" value= "<?php echo $cod_parroquia; ?>" /> <br>
                       <input type="hidden" name="SERVERURL" id="SERVERURL" value = "<?php echo SERVERURL?>">
                       <input type="hidden" name="SERVERDIR" id="SERVERDIR" value = "<?php echo SERVERDIR?>">
              </div>
            
  
   	           <div class="col-4">

                    <label  align="right" size="40"> <b>Estado:</b> </label>
                    <select class="form-control" name ="cod_estado" id="cbx_estado" required>
                          <option value ="">Elija una opcion</option>
                          <?php
                        
                        if (isset($cod_estado)) 

                        {       require_once('controllers/EstadosController.php');
                                $controller3= new EstadosController();
                                $resultado = $controller3->ListarEstados1();
                                while ($numrow = mysqli_fetch_array($resultado))
                                {?>
                                        
                                    <option value="<?php echo $numrow['Cod_Estado']; ?>" <?php 
                                   
                                    if ($numrow['Cod_Estado'] == $cod_estado){ 
                                        echo "selected";
                                        //$cod_estado = $numrow['Cod_Estado'];
                                    }?> 
                              ><?php echo $numrow['Des_Estado']; ?></option>
                           
                            <?php
                            }
                        }
                        
                         
                        ?>
                    </select> <br>
              </div>
              <div class = "col-4">
                    <label  align="right" size="40"> <b>Municipio:</b> </label>
                    <select class="form-control" name ="cod_municipio" id="cbx_municipio" required>
                          <option value ="">Elija una opcion</option>
                        
                        <?php
                         
                           if ($cod_estado != "") 
                           {
                                require_once('controllers/MunicipiosController.php');
                                $controller2= new MunicipiosController();
                                $resultado = $controller2->BuscarMunicipiosByEstado($cod_estado);
                                while ($numrow = mysqli_fetch_array($resultado))
                                {?>  
                                    <option value="<?php echo $numrow['Cod_Municipio']; ?>" <?php
                                    if ($numrow['Cod_Municipio'] == $cod_municipio){ 
                                        echo "selected";
                                        }?> >

                                        <?php echo $numrow['Des_Municipio']; ?></option>
                                
                                    <?php
                                }
                          }
                        ?>
                  
                    </select>
              </div>
            </div> <!-- 6 -->

            <div class = "row">
               <div class = "col-12">
                         <label for="busqueda" align="right" size="40"> <b>Nombre de la Parroquia:</b> </label> <input class="form-control mr-sm-2" title= "Solo letras son permitidas. Tamaño máximo 100 caracteres" type="search" align="right" size="52" placeholder = "<?php echo $des_parroquia?>" maxlength = "52" id="busqueda" name="des_parroquia" value = "<?php echo $des_parroquia?>" required pattern="[A-Za-záéíóúÁÉÍÓÚ ]{4,100}"/>  <br>       
                      
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
    require_once('views/Parroquias/listarparroquias.php');
}
?>