<?php
    //Esperanza Rodríguez Martínez
    /*Redireccionar*/
    include('sesion.php');
    $sesion = new Controlador();

    
    switch($_GET['dire']) {
		case "registro":	//registro
			$sesion->datosregistro();	//Llamamos a la función de datos resgistro
			break;
		case "inicio":	//inicio de sesion
			$sesion->datosinicio();	//Llamamos a la función de datos inicio
			break;
		case "cerrar":	//cerrar sesión
				//Destruir sesion
			header("Location: index.html");
			break;
	}

?>