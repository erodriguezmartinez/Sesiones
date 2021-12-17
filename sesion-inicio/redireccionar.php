<?php
    //Esperanza Rodríguez Martínez
    /*Redireccionar*/
    include('sesion.php');
    $sesion = new Controlador();

    
    switch($_GET['dire']) {

		case "inicio":	//inicio de sesion
			$sesion->datosinicio();	//Llamamos a la función de datos inicio
			break;

	}

?>