<!--Esperanza Rodríguez Martínez-->
<!--PÁGINA DE REGISTRO DE USUARIO-->
<html>
	<head>
		<title>Administrar crud</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" >
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilogeneraluno.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--TÍTULO-->
		<header>Registro</header>
		<!--CUERPO DE LA PÁGINA-->
		<main>
            <form action="redireccionar.php?dire=registro" method="post">
                <h1>REGISTRO</h1><br /><br />
                <label>Nombre:</label>
                <input type="text" name="nombre" pattern="^\w{3,60}$" required>
                <label>Correo:</label>
                <input type="text" name="correo" required>
                <label>Contraseña:</label>
                <input type="text" name="contrasena" pattern="^\w{5,20}$" required>
				<label>indique sus preferencias</label>
				<table>
					<tr id="cabeceras">
						<th>Selecciona</th>
						<th>Nombre</th>
					</tr>
					<?php
						include('sesion.php');
						$sesion = new Controlador();
						$sesion->vista->mostrar();
					?>
				</table>
                <div id="centrar">
                    <input type="submit" name="enviar" id="solicitar" value="Registrar">
                </div>
            </form>
		</main>
		<footer>
			Registro de usuario
		</footer>
	</body>
</html>
