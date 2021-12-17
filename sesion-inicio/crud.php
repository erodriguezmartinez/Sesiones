<?php
	class Crud{
		//<!--Esperanza Rodríguez Martínez-->
		//<!----------------------------------------CRUD--------------------------------------------------->

		private $conexion;
		private $resultado;

		function __construct() {

			require 'constantes.php';	//Incluimos Constantes.php donde tendrémos definidos los valores para la conexión

			$this->conexion  = new mysqli(SERVER,USUARIO,CONTRASENA,NOMBREBD);	//Conexión a bd
		}

		//Función para comprobar usuario
		function comprobar($correo,$contrasena){

			if($this->conexion === false){
				die("ERROR: Could not connect. " . $this->conexion->connect_error);	//Visualización de posible error
			}

			$consulta = "SELECT Nombre FROM Usuarios WHERE correo='".$correo."' AND contrasena='".$contrasena."';";

			if($this->conexion->query($consulta)->num_rows==1){ 
				return "bien";
			} else{
				return "error";
			}
		}

	}
?>
