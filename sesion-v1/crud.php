<?php
	class Crud{
		//<!--Esperanza Rodríguez Martínez-->
		//<!----------------------------------------CRUD--------------------------------------------------->

		private $conexion;
		private $resultado;

		function __construct() {

			require 'constantes.php';	//Incluimos Constantes.php donde tendrémos definidos los valores para la conexión

			$this->conexion  = new mysqli(SERVER,USUARIO,CONTRASENA,NOMBREBD);	//Conexión a bd
			session_start();
			//debug_to_console("Test");
		}


		//Función para añadir usuario
		function anadir($nombre,$correo,$contrasena){

			if($this->conexion === false){
				die("ERROR: Could not connect. " . $this->conexion->connect_error);	//Visualización de posible error
			}

			$consulta = "INSERT INTO Usuarios (Nombre, Correo, Contrasena) VALUES
			('".$nombre."','".$correo."', '".$contrasena."');";

			
			if($this->conexion->query($consulta) === true){

			} else{
				echo "El correo introducido ya existe";	//Visualización de posible error
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

		//Función para añadir las preferencias del usuario
		function preferencias($preferencias){
			if($this->conexion === false){
				die("ERROR: Could not connect. " . $this->conexion->connect_error);	//Visualización de posible error
			}

			$resultado=Crud::buscarid($_SESSION["correo"]);
			$fila = mysqli_fetch_assoc($resultado);
			if (is_array($preferencias)) {
				$num_selecionado = count($preferencias);

				foreach ($preferencias as $num_selecionado => $valor) {
            
                    $consulta = "INSERT INTO Preferencias (idusuario, idjuego) VALUES (".$fila['idusuario'].",$valor);";
					if($this->conexion->query($consulta) === true){
		
					} else{
					
						echo "ERROR";	//Visualización de posible error
					}
                }
            }
            header("Location: inicio.php");

            //Ejemplo de internet 
            /*
            if (is_array($preferencias)) {
                $selected = '';
                $num_countries = count($preferencias);
                $current = 0;
                foreach ($preferencias as $key => $value) {
                    if ($current != $num_countries-1)
                        $selected .= $value.', ';
                    else
                        $selected .= $value.'.';
                    $current++;
                }
            }
            else {
                $selected = 'Debes seleccionar un país';
            }

            echo '<div>Has seleccionado: '.$selected.'</div>';*/
		}
			
		function buscarid($correo){

			if($this->conexion === false){
				die("ERROR: Could not connect. " . $this->conexion->connect_error);	//Visualización de posible error
			}

			$consulta = "SELECT idusuario FROM Usuarios WHERE correo = '".$correo."';";		//Consulta a ejecutar
			return $this->resultado = mysqli_query($this->conexion, $consulta);
		}


	}
?>
