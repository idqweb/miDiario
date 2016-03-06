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
		<link rel="stylesheet" href="../css/estilos.php"/>
		<link rel="stylesheet" href="../css/botones.css"/>
		<link rel="stylesheet" href="../css/estiloTablas.css"/>
		<link rel="stylesheet" media="screen" type="text/css" href="../css/colorpicker.css" />

		
	<!-- JS NECESARIOS -->	
		<script src="../js/jquery-2.1.4.min.js"></script>
		<script src="../js/configPost1.js"></script>
		<script type="text/javascript" src="../js/colorpicker.js"></script>
		
		
	</head>
	<body>
		
		<!-- Archivos externos -->
		<?php
			
			include_once ("../funciones.inc.php"); // funciones y conexion con la DB
			include_once("../resize.inc.php"); // clase para redimensionar imagenes
		?>
		<div id="contenedor">
		<header>
			<div id="logotipo"><a href="../index.php"><div id="idLogotipoImg"></div></a></div>
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

				// pulsado boton de REESTABLECER configuracion basica
				if (isset ($_POST['btn-restart'])){
					
					echo "si entra aqui";
					
					$sqlCompuesto ="UPDATE configuracionweb SET id=1";
					$sqlCompuesto .=",anchoWeb='968px' ";
					$sqlCompuesto .=",tamanoLetra='16px' ";
					$sqlCompuesto .=",tipoLetra='Roboto' ";
					$sqlCompuesto .=",tamanoTitulos='2.1rem' ";
					$sqlCompuesto .=",tamanoCopete='1.35rem' ";
					$sqlCompuesto .=",tamanoMenuPrincipal='1.30rem' ";
					$sqlCompuesto .=",colorFondoWeb='#ffffff' ";
					$sqlCompuesto .=",colorTitulosWeb='#000000' ";
					$sqlCompuesto .=",colorLetraMenu='#000000' ";
					$sqlCompuesto .=",rutaLogo='../images/logo.png' ";
					$sqlCompuesto .="WHERE id=1";
					
					actualizaDB ($sqlCompuesto);
					
				}

			// pulsado el boton de configuracion TOTAL	
				if (isset ($_POST['btn-cambios'])){
													
					
					$sqlCompuesto ="UPDATE configuracionweb SET id=1";
					
					if(isset ($_POST['anchoWeb'])){
						if($_POST['anchoWeb'] != ""){
							$anchoWeb = $_POST['anchoWeb'];							
							$sqlCompuesto .=",anchoWeb='$anchoWeb' ";
						}
					}
					
					
					if(isset ($_POST['tamanoLetra'])){
						if ($_POST['tamanoLetra'] != ""){
							$tamanoLetra =	$_POST['tamanoLetra']."px";							
							$sqlCompuesto .=",tamanoLetra='$tamanoLetra' ";
						}
					}
					if(isset ($_POST['tipoLetra'])){
						if($_POST['tipoLetra'] != ""){
							$tipoLetra = $_POST['tipoLetra'];							
							$sqlCompuesto .=",tipoLetra='$tipoLetra' ";
						}
					}
					if(isset ($_POST['tamanoTitulos'])){
						if($_POST['tamanoTitulos'] != ""){
							$tamanoTitulos = $_POST['tamanoTitulos'];							
							$sqlCompuesto .=",tamanoTitulos='$tamanoTitulos' ";
						}
					}
					if(isset ($_POST['tamanoCopete'])){
						if($_POST['tamanoCopete'] != ""){
							$tamanoCopete = $_POST['tamanoCopete'];							
							$sqlCompuesto .=",tamanoCopete='$tamanoCopete' ";
						}
					}
					if(isset ($_POST['tamanoMenuPrincipal'])){
						if($_POST['tamanoMenuPrincipal'] != ""){
							$tamanoMenuPrincipal = $_POST['tamanoMenuPrincipal'];							
							$sqlCompuesto .=",tamanoMenuPrincipal='$tamanoMenuPrincipal' ";
						}
					}
					if(isset ($_POST['colorFondoWeb'])){
						if($_POST['colorFondoWeb'] != ""){
							$tamanoCopete = $_POST['colorFondoWeb'];							
							$sqlCompuesto .=",colorFondoWeb='$tamanoCopete' ";
						}
					}
					if(isset ($_POST['colorTitulosWeb'])){
						if($_POST['colorTitulosWeb'] != ""){
							$colorTitulosWeb = $_POST['colorTitulosWeb'];							
							$sqlCompuesto .=",colorTitulosWeb='$colorTitulosWeb' ";
						}
					}
					if(isset ($_POST['colorLetraMenu'])){
						if($_POST['colorLetraMenu'] != ""){
							$colorLetraMenu = $_POST['colorLetraMenu'];							
							$sqlCompuesto .=",colorLetraMenu='$colorLetraMenu' ";
						}
					}
					if (isset ($_FILES['archivo']['size'])){
						if ($_FILES['archivo']['size'] > 0){	
							
								$dir_subida="../images";



							$fichero_subido = $dir_subida.basename($_FILES['archivo']['name']); 

							if(move_uploaded_file($_FILES['archivo']['tmp_name'],$fichero_subido)){

								$ficheroOkSubido = true;

								$miLogo=new thumbnail($fichero_subido);
								$miLogo->size_width(403);
								$miLogo->size_height(161);
								$miLogo->save($dir_subida."/logotipo/".$_FILES['archivo']['name']);
								$elLogo = $dir_subida."/logotipo/".$_FILES['archivo']['name'];
								$sqlCompuesto .=",rutaLogo='$elLogo' ";
								unlink($fichero_subido); // orden de borrado del archivo subido
							}
							else{
								echo ("El archivo ha FALLADO");
								$ficheroOkSubido = false;
							}
						}
							
						}
					
					
					
					
					
					
					$sqlCompuesto .="WHERE id=1";
					
					
					
					actualizaDB ($sqlCompuesto);
					
				}




				
		
		?>
		
		
		<form  method="post" action="configWeb.php">
			<fieldset>
				<legend>Valores Iniciales</legend>
				<h3>Volver a los valores por defecto de la web "miDiario"</h3>
					<button type="submit" id="btn-restart"  name="btn-restart" class="large button blue" >Valores Predeterminados</button>
			</fieldset>
		</form>	
		<br/>
		<br/>		
		<form method="post" action="configWeb.php"  enctype="multipart/form-data">
			<fieldset>
			<legend>Personaliza miDiario</legend>
				<h3>Cambiar valores por "defecto" la web "miDiario"</h3>
				<p>Solo habrá cambios en quel campo que TU modifiques, los demás valores seguirán como estaban.</p>
				<div class="lineaSuperiorPost"><hr/></div>	
				<h4>Configuracion General</h4>
				<label>Ancho de Toda la web: </label><input type="text" name="anchoWeb" placeholder="Ej: 70% o 569px" /> ( % o px ).<br/>
				<div class="lineaFinPost"><hr/></div>
				
				<h4>Configuración Letras - Tipografías</h4>
			<label>Tamaño General Fuente Letra: </label>
									<select name="tamanoLetra">
										<option value="">Tamaño..</option>
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
				
				
				
				<label>Tipo Fuente: </label><input type="text" name="tipoLetra" placeholder="Ejemplo: arial" /><br/><br/>
				
				<label>Tamaño Titulos:</label>
									<select name="tamanoTitulos">
										<option value="">Tamaño..</option>
									 	<option value="2.6rem">Muy Grande</option>
										<option value="2.1rem">Normal</option>
										<option value="1.8rem">Pequeño</option>
										<option value="1.5rem">Muy Pequeño</option>										
									</select>
				<label>Tamaño Copete:</label>
									<select name="tamanoCopete">
										<option value="">Tamaño..</option>
									 	<option value="1.8rem">Muy Grande</option>
										<option value="1.35rem">Normal</option>
										<option value="1rem">Pequeño</option>
										<option value="0.9rem">Muy Pequeño</option>										
									</select>
				<label>Tamaño Letra Menu Principal:</label>
									<select name="tamanoCopete">
										<option value="">Tamaño..</option>
									 	<option value="1.8rem">Muy Grande</option>
										<option value="1.3rem">Normal</option>
										<option value="1rem">Pequeño</option>
										<option value="0.9rem">Muy Pequeño</option>										
									</select>		
				<div class="lineaFinPost"><hr/></div>
				<h4>Colores</h4>
				<label>Fondo Toda la web: #</label><input type="text" id="colorFondoWeb" name="colorFondoWeb"/>
				<label>Color Titulos: #</label><input type="text" id="colorTitulosWeb" name="colorTitulosWeb"/>
				<label>Color LetraMenu: #</label><input type="text" id="colorLetraMenu" name="colorLetraMenu"/><br/>
				<div class="lineaFinPost"><hr/></div>
				<h4>Cambia Logotipo</h4>
				<p>Se admiten archivos de imagen (jpg,gif,png etc..)</p>
				<label>Archivo:</label><input id="inputImage" name="archivo" type="file" accept="image/*"/><br/><br/>
				<div class="lineaSuperiorPost"><hr/></div>	
			
			<button type="submit" name="btn-cambios" class="large button blue" id="btn-cambios">Guarda Cambios</button>
			<button type="reset" class="large button red">Borrar Datos</button>
			</fieldset>
		</form>
		
		
		
		<footer>
			<hr/>
			<div id="licenciaIDQ">
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