<?php
// Este archivo contiene una clase PHP llamada Router, cuya función es procesar la URL de la solicitud y
// determinar qué controlador, acción e identificador deben ejecutarse en la aplicación. Básicamente,
// esta clase ayuda a estructurar la navegación dentro de una aplicación web basada en URLs.
// Y ayuda a trabajar con url amigables. Lo cual ayuda a dar cierto nivel de protección a la aplicación
// ocultando los nombres de las variables que pasan por el url 

class Router
{
	 public $uri;
	 public $controller;
	 public $action;
	 public $id;
		

	 public function __construct()
	 {
	 	$this->setUri();
	 	$this->setController();
	 	$this->setAction();
	 	$this->setId();
	 }

	 public function setUri(){
	 	$this->uri = explode ('/', $_SERVER["REQUEST_URI"]);
 	 }

	 public function setController()
	 {
    	$this->controller = $this->uri[2] === '' ? 'Estado' : $this->uri[2];
	 }

	 public function setAction()
	 {
    	$this->action  = !empty($this->uri[3]) ?  $this->uri[3] : 'ListarEstados';
	 }
     
	public function setId()
	{
    	$this->id  = !empty($this->uri[4]) ?  $this->uri[4] : '';
	}

	////////

	public function getUri()
	{
		return $this->uri;
	}

	public function getController()
	{
		return $this->controller;
	}

	public function getAction()
	{
		return $this->action;
	}

	
	public function getId()
	{
		return $this->id;
	}



}

?>