<?php
// Aqui se configura la variable conexion, tiene una relación intima con routing. 
// cada grupo irá alimentando este arreglo de acuerdo a su seccion del proyecto, y ojo, debe respetar las reglas de deonominación de cada archivo, 
// para mantenere estenadar en la codificacion
return array(
	'Ciudades' => ['ListarCiudades', 'IngresarCiudad', 'IngresarCiudad1', 'ActualizarCiudad', 'ActualizarCiudad1', 'BorrarCiudad', 'BorrarCiudad1'],
	'Parroquias' => ['ListarParroquias', 'IngresarParroquia', 'IngresarParroquia1', 'ActualizarParroquia', 'ActualizarParroquia1', 'BorrarParroquia', 'BorrarParroquia1'],
	'Municipios' => ['ListarMunicipios', 'IngresarMunicipio', 'IngresarMunicipio1', 'ActualizarMunicipio', 'ActualizarMunicipio1', 'BorrarMunicipio', 'BorrarMunicipio1'],
	'Estados' => ['ListarEstados', 'IngresarEstado', 'IngresarEstado1', 'ActualizarEstado', 'ActualizarEstado1', 'BorrarEstado', 'BorrarEstado1'],
	'Agencias' => ['ListarAgencias', 'IngresarAgencia', 'IngresarAgencia1', 'ActualizarAgencia', 'ActualizarAgencia1', 'BorrarAgencia', 'BorrarAgencia1'],
	'Servicios' => ['ListarServicios', 'IngresarServicio', 'IngresarServicio1','ActualizarServicio','ActualizarServicio1','BorrarServicio','BorrarServicio1'],
	'AgenciasServicios' => ['IngresarAgenciaServicio', 'IngresarAgenciaServicio1']
);
?>