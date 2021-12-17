<?php
    //Esperanza Rodríguez Martínez
    /*Redireccionar*/
    include('sesion.php');
    $sesion = new Controlador();

    
    switch($_GET['dire']) {
		case "registro":	//registro
			$sesion->datosregistro();	//Llamamos a la función de datos resgistro
			break;
	}

?>