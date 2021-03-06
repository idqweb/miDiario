<?php	session_start(); ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Diapositivas de Fotos</title>
		<meta name="description" content="Mi diario es una página web en la que plasmar todos mis pensamientos.">
		<meta name="keywords" content="diario,blog personal,pensamientos">
		<meta name="author" content="Isaac Díez">
		<!-- Para la zona RESPONSIVE -->
		<meta name="viewport" content="width=device-width">	
	<!-- CSS PERSONALIZADOS -->
		<link rel="stylesheet" href="./css/estilos.php"/>
	<!-- JS NECESARIOS -->	
	<script src="./js/jquery-2.1.4.min.js"></script>
	<script src="js/jquery.slides.min.js"></script>
	<script src="./js/configPost.js"></script>
  
 	</head>
	<body>
		
		<!-- Archivos externos -->
		<?php
			include_once ("funciones.inc.php"); // funciones y conexion con la DB
		?>
		<div id="contenedor">
		<header>
			<div id="logotipo"><a href="./index.php"><div id="idLogotipoImg"></div></a></div>
			<?php
				// menu login

				if (isset ($_SESSION['logeado']) && $_SESSION['logeado'] == true){
					// si esta logeado el admin muestra su menu
						include ("menuAdmin.inc.php");
								
				}
				else{
					// si no esta logeado el admin muestra el formulario de Login
						include ("menu.inc.php");	
					}
			?>
			
		
			
		</header>
		<div id="menuWeb">
			<?php include_once ("menuDeLaWeb.inc.php");?>
		</div>
		
		
		
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
					$sql="select * from articulos where cuerpo = 'noexiste666' order by fecha ASC";
					
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
							echo "<div class='container'>";
							echo "<div id='slides'>";
							
							
							
							while($registro = mysqli_fetch_array($resultado)){
								
								$directorioSlides ="./uploads/fotos/slides/";
								$directorioFotos="./uploads/fotos/";
								$multimedia =$registro['multimedia'];
								$estruturaLink = explode("/",$multimedia);
								$estrucuraDirectorio= "/".$estruturaLink[1]."/".$estruturaLink[2]."/";
								$archivo = $estruturaLink[3];
								
								if ($estrucuraDirectorio == "/uploads/fotos/"){
									?>
										<?php include ("plantillaSlides.inc.php"); ?>
									<?php
									
								}
								
								
								

								
							}
							echo "</div>";
							echo "</div>";
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
		
		
		
		
		<footer>
			<hr/>
			<div id="licenciaIDQ">
			<a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png" />
				</a><br />Mi Diario por <a href="http://idqweb.com/" target="_blank">IDQ</a> se distribuye bajo una <a rel="license" href="http://creativecommons.org/licenses/by/4.0/" target="_blank">Licencia Creative Commons Atribución 4.0 Internacional</a>
			</div>
		</footer>
		
	<!-- SlidesJS Required: Initialize SlidesJS with a jQuery doc ready -->
  <script>
    $(function() {
      $('#slides').slidesjs({
        width: 940,
        height: 529,
         navigation: {
     		 active: true,
				// [boolean] Generates next and previous buttons.
				// You can set to false and use your own buttons.
				// User defined buttons must have the following:
				// previous button: class="slidesjs-previous slidesjs-navigation"
				// next button: class="slidesjs-next slidesjs-navigation"
      			effect: "slide"
        		// [string] Can be either "slide" or "fade".
    } , 
		  play: {
      active: true,
        // [boolean] Generate the play and stop buttons.
        // You cannot use your own buttons. Sorry.
      effect: "slide",
        // [string] Can be either "slide" or "fade".
      interval: 5000,
        // [number] Time spent on each slide in milliseconds.
      auto: false,
        // [boolean] Start playing the slideshow on load.
      swap: true,
        // [boolean] show/hide stop and play buttons
      pauseOnHover: false,
        // [boolean] pause a playing slideshow on hover
      restartDelay: 2500
        // [number] restart delay on inactive slideshow
    }
		  
      });
    });
  </script>
  <!-- End SlidesJS Required -->	

		</div>		
			
	</body>
</html>