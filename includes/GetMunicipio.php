<?php

    $html= '';
    $id_estado = $_POST['id_estado'];
    $SERVERDIR = $_POST['SERVERDIR'];
    $curDir = $SERVERDIR;
    chdir($curDir);

    require_once ('controllers/MunicipiosController.php');
    $controller= new MunicipiosController();
    $resultado= $controller->BuscarMunicipiosByEstado($id_estado);

    
    //$html= "<option value='0'>Escoja Municipio</option>";
  
    $row = mysqli_num_rows($resultado);
    $html.= "<option value = ''>Elija una opcion</option>";
    while($row = $resultado->fetch_assoc())
    {
        $html.= "<option value='".$row['Cod_Municipio']."'>".$row['Des_Municipio']."</option>";
    
    }
    
    echo $html;

?>
