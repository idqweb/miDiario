<?php	session_start(); ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Panel Administracion</title>
		<meta name="description" content="Panel Administracion de la web Mi Diario">
		<meta name="keywords" content="diario,blog personal,pensamientos">
		<meta name="author" content="Isaac Díez">
	<!-- CSS PERSONALIZADOS -->
		<link rel="stylesheet" href="../css/estilos.css"/>
	<!-- JS NECESARIOS -->	
	<script src="../js/jquery-2.1.4.min.js"></script>
		
	</head>
	<body>
		
		<!-- Archivos externos -->
		<?php
			include ("../mysql.inc.php"); // datos conexion DB
			
		?>
	<div id="contenedor">
		<header>
			<div id="logotipo"><a href="../index.php"><img src="../images/logotipo_web.png" alt="logotipo Mi Diario"/></a></div>
			<?php
				// menu login

				if (isset ($_SESSION['logeado']) && $_SESSION['logeado'] == true){
					// si esta logeado el admin muestra su menu
						include ("./menuAdmin1.inc.php");
								
				}
				else{
					// si estas aqui pero no logeado te mando a la portada INDEX
					 header("Location:../index.php");
					
				}
			?>
			
			
			
		</header>
		<div id="menuWeb">
			<?php include_once ("./menuDeLaWebEnAdmin.inc.php"); ?>			
		</div>
		
			
		<h3>Acciones posibles:</h3>
		
		<div id="accionesPanel">
			<span class="opcionesPanel">
				<a href="./nuevaEntrada.php">
				<img src=".././images/img-newPost-180.png" alt="Nuevo Post" />
					<div class="textoPanel">Entrada Texto</div></a>
			</span>
			<span class="opcionesPanel">
				<a href="./nuevaEntradaMultimedia.php">
				<img src=".././images/img-newMultimedia-180.png" alt="Nuevo Post Multimedia" />
				<div class="textoPanel">Entrada Multimedia</div></a>
			</span>
			<span class="opcionesPanel">
				<a href="./listadoEntradas.php">
				<img src=".././images/img-listado-180.png" alt="Ver Listado" />
				<div class="textoPanel">Listado Entradas</div></a>
			</span>	
			<span class="opcionesPanel">
				<a href="./configWeb.php">
				<img src=".././images/img-config-180.png" alt="Configura Web" />
				<div class="textoPanel">Configura la Web</div></a>
			</span>
		</div>
		
		
		<footer>
			<hr/>
			<div class="licenciaIDQ">
			<a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png" />
				</a><br />Mi Diario por <a href="http://idqweb.com/" target="_blank">IDQ</a> se distribuye bajo una <a rel="license" href="http://creativecommons.org/licenses/by/4.0/" target="_blank">Licencia Creative Commons Atribución 4.0 Internacional</a>
			</div>
		</footer>
		
		
	</div>	

		
		
	</body>
</html>