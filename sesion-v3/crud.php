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


		//Función para añadir usuario
		function anadir($nombre,$correo,$contrasena,$preferencias){

			if($this->conexion === false){
				die("ERROR: Could not connect. " . $this->conexion->connect_error);	//Visualización de posible error
			}

			$consulta = "INSERT INTO Usuarios (Nombre, Correo, Contrasena) VALUES
			('".$nombre."','".$correo."', '".$contrasena."');";

			if($this->conexion->query($consulta)){
				$id=$this->conexion->insert_id;
				$num_selecionado = count($preferencias);

				foreach ($preferencias as $num_selecionado => $valor) {
            
                    $consulta = "INSERT INTO Preferencias (idusuario, idjuego) VALUES ($id,$valor);";
					if($this->conexion->query($consulta) === true){
		
					} else{
					
						echo "ERROR";	//Visualización de posible error
					}
                }

				if($this->conexion->query($consulta) ){
	
				} else{
				
					echo "ERROR, al añadir las preferencias del usuario añadido";	//Visualización de posible error
				}
			} else{
				echo "ERROR, al guardar el usuario";	//Visualización de posible error
			}

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

		//Función para listar minijuegos
		function listar(){

			if($this->conexion === false){
				die("ERROR: Could not connect. " . $this->conexion->connect_error);	//Visualización de posible error
			}

			$consulta = "SELECT * FROM minijuegos";	//Consulta a ejecutar
			return $this->resultado = mysqli_query($this->conexion, $consulta);
		}
		//Función para listar preferencias elegidas
		function listarpreferencias(){

			if($this->conexion === false){
				die("ERROR: Could not connect. " . $this->conexion->connect_error);	//Visualización de posible error
			}
			$consulta = "SELECT nombre,url FROM minijuegos INNER JOIN preferencias ON minijuegos.idjuego=preferencias.idjuego
			WHERE idusuario=(SELECT idusuario FROM usuarios WHERE correo='".$_SESSION['correo']."');";	//Consulta a ejecutar

			return $this->resultado = mysqli_query($this->conexion, $consulta);
		}


	}
?>
