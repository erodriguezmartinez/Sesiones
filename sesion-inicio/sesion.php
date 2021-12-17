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