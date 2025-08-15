<?php 
   require_once('controllers/CiudadesController.php');
   $controller= new CiudadesController();
   $result_ciudad= $controller->ListarCiudades1();
   $numrows = mysqli_num_rows($result_ciudad);
?>

<div class="contaniner">

<div class="panel-heading" style =" background-color: #2F5597">
        <div class = "row">
            <div class = "col-10" style = "color : white">
                <h4> <b>Domicilio / Ciudades Registradas</b></h4>
            </div>
            <div class = "col-2">
                <form action= "<?php echo SERVERURL?>Ciudades/IngresarCiudad" method = "POST"> 
                    <button type="submit" class="btn btn-prymary" text-align = "center">Agregar</button>
                </form>
            </div>
          </div>  
</div>


<br> <br>
<div class="table-responsive">
<table id="dtBasicExample" data-order='[[ 0, "asc" ]]' data-page-length='10' class="table table-sm table-striped table-hover table-bordered" cellspacing="0" width="100%" >
 
  <thead>
     <tr>
              <th class="th-sm">Id</th>
              <th class="th-sm">Ciudad</th>
              <th class="th-sm">Estado</th>
              <th class="th-sm"></th>
              <th class="th-sm"></th>
     </tr>

  </thead>

 <tbody>
 <?php 
     
      if ($numrows != 0)
      {
         while ($numrows = mysqli_fetch_array($result_ciudad))
         {?>
              <tr>
                  <?php
                      $i = $numrows["Cod_Ciudad"];
                  ?>
                  <th scope="row"><?php echo $numrows["Cod_Ciudad"]; ?></th>

                  <td><?php echo $numrows["Des_Ciudad"]; ?></td>
                  <td><?php echo $numrows["Des_Estado"]; ?></td>

                 <form action= "<?php echo SERVERURL?>Ciudades/ActualizarCiudad/<?php echo $i?>" method = "POST"> 
                  <td align= "center" width="50px">
                      <button type="submit" class="btn btn-sm btn-success btn-sm" text-align = "center">Actualizar</button>
                  </td>
                  </form>

                  <form action= "<?php echo SERVERURL?>Ciudades/BorrarCiudad/<?php echo $i?>" method = "POST"> 
                  <td align= "center" width="50px">
                      <button type="submit" class="btn btn-sm btn-warning btn-sm" text-align = "center">Eliminar</button>
                  </td>
                  </form>
              </tr>
          <?php }
      }
?>
</tbody>
</table>
</div>
</div>