<?php	session_start(); ob_start(); ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Panel Administracion - Configura Web</title>
		<meta name="description" content="Panel Administracion de la web Mi Diario">
		<meta name="keywords" content="diario,blog personal,pensamientos">
		<meta name="author" content="Isaac Díez">
	<!-- CSS PERSONALIZADOS -->
		<link rel="stylesheet" href="../css/estilos.css"/>
		<link rel="stylesheet" href="../css/estiloTablas.css"/>
	<!-- JS NECESARIOS -->	
		<script src="../js/jquery-2.1.4.min.js"></script>
		<script src="../js/configPost1.js"></script>
	<!-- NECESARIO PARA EL EDITOR -->
		<script src="./ckeditor/ckeditor.js"></script>
		
	</head>
	<body>
		
		<!-- Archivos externos -->
		<?php
			
			include_once ("../funciones.inc.php"); // funciones y conexion con la DB
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
				<?php include_once ("./menuDeLaWebEnAdmin.inc.php");?>			
			</div>
	
			<h1>Configura tu página Web</h1>
		
		<?php


				if (isset ($_POST['btn-configBasica'])){
					
					$tamanoLetra ="16px";
					$tipoLetra = "Roboto";

					actualizaDB ($tamanoLetra,$tipoLetra);
					
				}

				if (isset ($_POST['btn-configBasica'])){
					
					$tamanoLetra ="16px";
					$tipoLetra = "Roboto";

					actualizaDB ($tamanoLetra,$tipoLetra);
					
				}




				
		
		?>
		
		
		<form id="configBasica" method="post" action="configWeb.php">
			<fieldset>
				<legend>Valores Iniciales</legend>
				<h3>Si deseas volver a los valores por defecto.</h3>
					<button id="btn-configBasica" class="btnPanel" >Valores Predeterminados</button>
			</fieldset>
		</form>	
		
		<form method="post" action="./nuevaEntrada.php">
			<fieldset>
			<legend>Personaliza miDiario</legend>
			<label>Tamaño fuente letra:</label>
									<select name="tamanoLetra">
									 	<option value="9">9</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
										<option value="16">16</option>
										<option value="17">17</option>
										<option value="18">18</option>
										<option value="20">20</option>
										<option value="22">22</option>
										<option value="24">24</option>
										<option value="26">26</option>
										<option value="28">28</option>
										<option value="30">30</option>
										<option value="32">32</option>
										<option value="34">34</option>
										<option value="36">36</option>
										<option value="40">40</option>
										<option value="44">44</option>
										<option value="48">48</option>
										<option value="56">56</option>
										<option value="64">64</option>
										<option value="72">72</option>
									</select>			
				
				
				
			<label>Tipo Fuente</label><input type="text" name="tipoLetra" placeholder="Ejemplo: arial" /><br/>
				
				
				
				
				
				
				
				
			
				
			<button name="btn-cambios" id="btn-cambios">Guarda Cambios</button>
			
			</fieldset>
		</form>
		
		
		
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
<?php
ob_end_flush();
?>