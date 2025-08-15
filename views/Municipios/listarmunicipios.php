
<?php 
   require_once('controllers/MunicipiosController.php');
   $controller= new MunicipiosController();
   $result_municipio= $controller->ListarMunicipios1();
   $numrows = mysqli_num_rows($result_municipio)
?>

<div class="contaniner">



<div class="panel-heading" style =" background-color: #2F5597">
        <div class = "row">
            <div class = "col-10" style = "color : white">
                <h4> <b>Domicilio / Municipios Registrados</b></h4>
            </div>
            <div class = "col-2">
                <form action= "<?php echo SERVERURL?>Municipios/IngresarMunicipio" method = "POST"> 
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
              <th class="th-sm">Municipio</th>
              <th class="th-sm">Estado</th>
              <th class="th-sm"></th>
              <th class="th-sm"></th>
     </tr>

  </thead>

 <tbody>
 <?php 
     
      if ($numrows != 0)
      {
         while ($numrows = mysqli_fetch_array($result_municipio))
         {?>
              <tr>
                  <?php
                      $i = $numrows["Cod_Municipio"];
                  ?>
                  <th scope="row"><?php echo $numrows["Cod_Municipio"]; ?></th>
                  <td><?php echo $numrows["Des_Municipio"]; ?></td>
                  <td><?php echo $numrows["Des_Estado"]; ?></td>

                 <form action= "<?php echo SERVERURL?>Municipios/ActualizarMunicipio/<?php echo $i?>" method = "POST"> 
                  <td align= "center" width="50px">
                      <button type="submit" class="btn btn-sm btn-success btn-sm" text-align = "center">Actualizar</button>
                  </td>
                  </form>

                  <form action= "<?php echo SERVERURL?>Municipios/BorrarMunicipio/<?php echo $i?>" method = "POST"> 

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


 


