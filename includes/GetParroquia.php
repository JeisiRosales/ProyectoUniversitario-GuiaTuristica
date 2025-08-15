<?php

    $html= '';
    $id_municipio = $_POST['id_municipio'];
    $SERVERDIR = $_POST['SERVERDIR'];
    $curDir = $SERVERDIR;
    chdir($curDir);

    require_once ('controllers/ParroquiasController.php'); 
    $controller= new ParroquiasController();
    $resultado= $controller->BuscarParroquiasByMunicipio($id_municipio);
  
    $row = mysqli_num_rows($resultado);
    $html.= "<option value=''>Elija una opcion</option>";
    while($row = $resultado->fetch_assoc())
    {   

        $html.= "<option value='".$row['Cod_Parroquia']."'>".$row['Des_Parroquia']."</option>";
    
    }
    
    echo $html;

?>
