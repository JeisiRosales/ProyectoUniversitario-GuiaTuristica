<?php 

  // Este es el primer archivo visible que se inicia cuando se abre el proyecto desde el navegador.

  // Esta seccion borra e inicia cierta variable de sesión, dado que el control de acceso a usuarios lo suprimí para la práctica

  ob_clean();
  ob_start();
  session_start();
  $_SESSION['User'] = "SUHAIL"; 
  $controller;
   
  // Aqui se llama al núcleo de la aplicación  donde se obtienen los enrutamientos

  require 'core/Router.php';
  $router = new Router();
  echo "Este es el Controlador: "; 
  echo $controller = $router->getController();
  echo "<br>";
  echo "Esta es la Accion o Método de la Clase: "; 
  echo $action = $router->getAction();
  
   if (isset($_SESSION['itemMenu']) == 0)  
   {
         $_SESSION['itemMenu'] = "Playas"; 

   }else{ 
 
   		$_SESSION['itemMenu'] = $controller; 

   }

 
  require_once('views/Layouts/layout.php'); 
