<?php

// Aqui se configuran variables de enrutamiento a los archivos, mantenga el esuema de trabajo.
// Algunas de estas variables fueron suprimidas para efectos de la práctica
// Pero las cuatro primeras son fundamentales, NO LAS CAMBIE, todos deben mantener el mismo esquema de trabajo, y el profesor debe
// hacer la compilación de los módulos una vez cada quien haya programado la seccion del proyecto que le corresponde

	const SERVERURL = "http://localhost/infomargarita/"; //ruta donde se encuentra alojado el proyecto ua sea un servidor local o remoto
	const SERVERDIR = "/wamp64/www/infomargarita/"; //ruta donde se encuentra alojado el proyecto ua sea un servidor local o remoto

	const MSG_ADVERTENCIA_CU = "Ocurrió un error mientras se intentaba ingresar o actualizar el registro en la base de datos. Revise los datos e intente nuevamente. Asegúrese de: (a) No estar intentando ingresar registros duplicados; (b) No estar modificando datos inexistentes; o (c) De que ha hecho un cambio en algún campo de datos durante la actualización.";

	const MSG_EXITO_CU = "ha sido ingresado o modificado en la base de datos de forma satisfactoria.";


	const MSG_ADVERTENCIA_DE = "Ocurrió un error mientras se intentaba eliminar el registro en la base de datos. Revise los datos e intente nuevamente. Asegúrese de: (a) no estar intentando eliminar un registro inexistente, (b) no estar intentando eliminar un registro vinculado a otro dato dentro de la base de datos.";


	const MSG_EXITO_DE = "ha sido eliminado de la base de datos de forma satisfactoria.";

	const MSG_ERROR_INPUT = "La operación no fue exitosa. Hubo algún error en la entrada de datos. Revice el formato aceptado para cada tipo de dato e intente nuevamente. De persistir el problema comuníquese con el administrador de la web.";

?>