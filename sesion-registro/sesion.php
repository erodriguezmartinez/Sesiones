<?php
    //Esperanza Rodríguez Martínez
    /*Modelo, vista controlador*/
    /**
     * Clase controlador (ejecución)
     */
    class controlador{

        public $vista;
        public $modelo;

        function __construct(){
            $this->vista = new Vista();
            $this->modelo = new Modelo();
        }

        /**
         * Función de obtención de datos del registro
         */
        function datosregistro(){

            //VALIDAMOS LOS DATOS PARA REGISTRAR USUARIO--------------->

            //Validamos los datos introducidos
            
            //Incluimos el archivo crud.php para utilizar las funciones definidas en el
            include('crud.php');
            $crud = new Crud();
            $comprobar=$crud->anadir($_POST["nombre"],$_POST["correo"],$_POST["contrasena"],$_POST["preferencia"]);	//Llamamos a la función de añadir
            header("Location: index.php");
        
	
        }
        
       

    }
    
    /**
     * Clase vista (mostrar datos)
     */
    class Vista{
        function __construct(){
            
        }
        /**
         * Función para mostrar las preferencias a elegir 
         */
        function mostrar(){

            //Incluimos el archivo crud.php para utilizar las funciones definidas en el
            include('crud.php');
            $crud = new Crud();

            $resultado=$crud->listar();

            while($fila = mysqli_fetch_assoc($resultado)){
                echo '<tr>
                    <td><input type="checkbox" name="preferencia[]" value="'.$fila["idjuego"].'" ></td>
                    <td>'.$fila["nombre"].'</td>
                </tr>';
            };
        }
        
    }
    /**
     * Clase modelo (obtención de datos)
     */
    class Modelo{
        function __construct(){
            
        }
    }

    
?>