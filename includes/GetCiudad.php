<?php

    $html= '';
    $id_estado = $_POST['id_estado'];
    $SERVERDIR = $_POST['SERVERDIR'];
    $curDir = $SERVERDIR;
    chdir($curDir);

    require_once ('controllers/CiudadesController.php'); 
    $controller= new CiudadesController();
    $resultado= $controller->BuscarCiudadesByEstado($id_estado);
  
    $row = mysqli_num_rows($resultado);
    $html.= "<option value=''>Elija una opcion</option>";
    while($row = $resultado->fetch_assoc())
    {   

        $html.= "<option value='".$row['Cod_Ciudad']."'>".$row['Des_Ciudad']."</option>";
    
    }
    
    echo $html;

?>
