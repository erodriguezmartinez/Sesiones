<!--Esperanza Rodríguez Martínez-->
<!--PÁGINA PARA INICIO-->
<html>
	<head>
		<title>Administrar crud</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" >
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilogeneraluno.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--TÍTULO-->
		<header>Inicio</header>
		<!--CUERPO DE LA PÁGINA-->
		<section><a href="redireccionar.php?dire=cerrar">Cerrar Sesión</a></section>
		<main>
            <form action="redireccionar.php?dire=preferencias" method="post">
                <h1>INDIQUE SUS PREFERENCIAS</h1><br /><br />
				<table>
					<tr id="cabeceras">
						<th>Selecciona</th>
						<th>Nombre</th>
						<th>Url</th>
					</tr>
					<?php
						include('sesion.php');
						$sesion = new Controlador();
						$sesion->vista->mostrar();
					?>
				</table>
                <div id="centrar">
                    <input type="submit" name="enviar" id="solicitar" value="Enviar">
                </div>
            </form>
		</main>
		<footer>
			Inicio de usuario
		</footer>
	</body>
</html>
