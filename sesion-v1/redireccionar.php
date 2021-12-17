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
    case "preferencias":	//preferencias
      //Incluimos el archivo crud.php para utilizar las funciones definidas en el
      include('crud.php');
      $crud = new Crud();
      $crud->preferencias($_POST['preferencia']);	//Llamamos a la función de preferencias
      break;
      case "cerrar":	//cerrar sesión
        	//Destruir sesion
        header("Location: index.html");
        break;
	}

?>