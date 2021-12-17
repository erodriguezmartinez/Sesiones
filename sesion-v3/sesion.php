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
            header("Location: registro.php");
        
	
        }
        
        /**
         * Función de obtención de datos del inicio de sesión
         */
        function datosinicio(){

            //VALIDAMOS LOS DATOS  PARA INICIOAR SESIÓN EL USUARIO--------------->

            //Validamos los datos introducidos
            
            //Incluimos el archivo crud.php para utilizar las funciones definidas en el
            include('crud.php');
            $crud = new Crud();

            $comprobar=$crud->comprobar($_POST["correo"],$_POST["contrasena"]);	//Llamamos a la función de comprobar
            echo $comprobar;
            if($comprobar=='bien'){
                //Creamos sesión para identificar el usuario
                session_start();
                $_SESSION["correo"] =  $_POST["correo"];
                header("Location: inicio.php");
            }else{
                 $this->vista->comprobar();
                
            }

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
        /**
         * Función para mostrar las preferencias elegindas por el usuario
         */
        function mostrarpreferencias(){
            //Incluimos el archivo crud.php para utilizar las funciones definidas en el
            include('crud.php');
            $crud = new Crud();

            $resultado=$crud->listarpreferencias();

            while($fila = mysqli_fetch_assoc($resultado)){
                echo '<tr>
                    <td>'.$fila["nombre"].'</td>
                    <td><a href="'.$fila["url"].'">Jugar</a></td>
                </tr>';
            };
        }
        /**
         * Función para mostrar mensaje de error en inicio de sesión por correo o contraseña inválida o no resgrato aún
         */
        function comprobar(){
            echo "<script type='text/javascript'>alert('Error, la contraseña o correo, es erronea o  no está registrado');window.location.href='index.html'</script>";
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