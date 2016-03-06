<?php	session_start(); ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Portada Mi diario</title>
		<meta name="description" content="Mi diario es una página web en la que plasmar todos mis pensamientos.">
		<meta name="keywords" content="diario,blog personal,pensamientos">
		<meta name="author" content="Isaac Díez">
	<!-- CSS PERSONALIZADOS -->
		<link rel="stylesheet" href="./css/estilos.php"/>
		
	<!-- JS NECESARIOS -->	
	<script src="./js/jquery-2.1.4.min.js"></script>
		<script src="./js/configPost.js"></script>
	
		
		
	<!-- JS para lente -->	
	
	
		
	</head>
	<body>
		
		<!-- Archivos externos -->
		<?php
			include_once ("funciones.inc.php"); // funciones y conexion con la DB
		?>
	<div id="contenedor">
		<header id="ancla">
			<div id="logotipo"><a href="./index.php"><div id="idLogotipoImg"></div></a></div>
			<?php
				// menu login

				if (isset ($_SESSION['logeado']) && $_SESSION['logeado'] == true){
					// si esta logeado el admin muestra su menu
						include ("./menuAdmin.inc.php");
								
				}
				else{
					// si no esta logeado el admin muestra el formulario de Login
						include ("menu.inc.php");	
					}
			?>
			
			
			
		</header>
		<div id="menuWeb">
			<?php include_once ('menuDeLaWeb.inc.php');?>
		</div>
		
	<div id="contenedor-post">
		
		<!-- listado Articulos ordenados por Fecha -->
		<?php
				#lanzo la conexion de MYSQL server
				conecta($c);
				
				if($c==null)
					echo "Fallo en la conexion";
				else{
					$nombredb="proyectofinal";
					mysqli_select_db($c,$nombredb);
					// aqui vienen los comandos SQL 
					
					
					// sacar todos los articulos
					$sql="select * from articulos order by fecha DESC";
					
					#ejecuto la orden SQL
					$resultado=mysqli_query($c,$sql);
					
					
					if($resultado){
						#orden correcta
						
						#compruebo que se ejecuto la orden
						#compruebo las filas modificadas
						$filas=mysqli_affected_rows($c);
						
						if($filas = 0 || $filas == null){
							// añadir el campo null por si se le ocurre consultar con la agenda vacia
							echo "No hay articulos";
						}
						else{
							#el fetch pasa la informacion a $registro y
							#avanza el puntero a la siguiente fila y cuando termine finaliza el while
							
							while($registro = mysqli_fetch_array($resultado)){
								//para cambiar la fecha a dia-mes-year se usa strtotime
								//echo date("d-m-Y",strtotime($registro['fecha']));
								
								//AQUI IRA EL CONTENIDO HTML
								
								// es una entrada de post normal y carga la plantilla posts normales
								if($registro['multimedia'] == "noexiste"){
									
								?>	
									
										<?php include ("postNormal.inc.php"); ?>
								<?php	
								}
								
								
								if($registro['cuerpo'] == "noexiste666"){
									?>
									<?php include ("postMultimedia.inc.php"); ?>
									<?php
								}
								
								
							}
							
						}
						
						
					}
					else{
							#orden SQL incorrecta
							#incluido el fallo de clave duplicada Duplicate Key
							$error=mysqli_error($c);
							echo $error;
					}
					
							
					// cerramos conexion a la DB
					mysqli_close($c);
				}
		
		?>
		
		

		
		</div>
		
		<footer>
			<hr/>
			<div id ="licenciaIDQ">
			<a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png" />
				</a><br />Mi Diario por <a href="http://idqweb.com/" target="_blank">IDQ</a> se distribuye bajo una <a rel="license" href="http://creativecommons.org/licenses/by/4.0/" target="_blank">Licencia Creative Commons Atribución 4.0 Internacional</a>
			</div>
		</footer>
		
	</div>
		
		 <a id="miAncla" href="#ancla"><img src="./images/up.png" alt="Subir Flecha"/></a> 

		
		
	</body>
</html>