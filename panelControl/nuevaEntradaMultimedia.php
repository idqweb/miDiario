<?php	session_start(); ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Panel Administracion - Nueva Entrada Multimedia</title>
		<meta name="description" content="Panel Administracion de la web Mi Diario">
		<meta name="keywords" content="diario,blog personal,pensamientos">
		<meta name="author" content="Isaac Díez">
	<!-- CSS PERSONALIZADOS -->
		<link rel="stylesheet" href="../css/estilos.css"/>
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
			include_once("../resize.inc.php"); // clase para redimensionar imagenes
			
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
	
		<h1>Publica un Nuevo Post Multimedia</h1>
		
		<div id="formularioPost">
			
			
		<form method="post" action="./nuevaEntradaMultimedia.php" enctype="multipart/form-data" >
			
			<fieldset>
				<legend>Insertar Entrada Multimedia</legend>
			<label>Titular:</label><input type="text" id="titulo" name="titulo" required autofocus /><br/>
			<label>Tema:</label>
						<select name="tema" id="tema">
						  <option value="Reflexiones">Reflexiones</option>
						  <option value="Viajes">Viajes</option>
						  <option value="Vivencias">Vivencias</option>
						  <option value="Pensamientos">Pensamientos</option>
						</select>
			<input type="hidden" id="fecha" name="fecha" value="<?=date('Y-m-d H:i:s')?>" />
			<label>Autor:</label><input type="text" id="autor" name="autor" /><br/>
			<span class="avisoFormulario">* Opcional: Si no pones nada será "admin".</span>
			<label>Archivo:</label><input id="inputImage" name="archivo" type="file" accept="image/*"/><br/>
			<button type="reset" class="">Borrar Datos</button>
			<button type="submit" name="b-submit" class="">Añadir Entrada</button>
			
			
			</fieldset>
		</form>
			
		</div>
		<?php
			// recordar que el nombre no puede ser mayor de VARCHAR(100) con ruta incluida			
			// subida imagenes
				
								
				
			if (isset ($_POST['b-submit'])){
				
				
						// preguntar a sergio chmod_R( '.././uploads/', 0777, 0777); 
				
				

						$dir_subida="../uploads/fotos/";
				
						
							
				
						
						
						$fichero_subido = $dir_subida.basename($_FILES['archivo']['name']); 
										
						if(move_uploaded_file($_FILES['archivo']['tmp_name'],$fichero_subido)){
							
							$ficheroBienSubido = true;
							//si no existe el directorio para las miniaturas lo creamos
							
							$carpetaMiniaturas = '../uploads/fotos/thumbnails';
								if (!file_exists($carpetaMiniaturas)) {
									mkdir($carpetaMiniaturas, 0777, true);
								}
							
							// si la sube con exito creamos la miniatura o thumbail
							$thumb=new thumbnail($fichero_subido);
							//$thumb->size_width(800);
							//$thumb->size_height(600);
							$thumb->size_auto(180);
							$thumb->save($dir_subida."/thumbnails/".$_FILES['archivo']['name']);
							
							// si la sube con exito creamos el slide
							$slide=new thumbnail($fichero_subido);
							$slide->size_auto(968);
							$slide->save($dir_subida."/slides/".$_FILES['archivo']['name']);
							
						}
						else{
							echo ("El archivo ha FALLADO".$error);
							$ficheroBienSubido = false;
						}
			}
		?>	
		
		
		
		
		
		<?php 
			if (isset ($_POST['b-submit'])){
				if ( !isset ($_POST['titulo']) ||!isset ($_POST['tema']) || !isset ($_POST['fecha']) || !isset ($_POST['autor'])){

						echo "Fallo en el envio de datos de alta del post";	

					}
					else{
					
					//validar que se ponga titulo	
					if( ($ficheroBienSubido) && $_POST['titulo'] != ""){
						
						
						$id = 0;
						$titular = $_POST['titulo'];
						$copete = "ninguno";
						$tema = $_POST['tema'];
						$fecha = $_POST['fecha'];
						
						if ( $_POST['autor'] == ""){
							
							$autor = $_SESSION['login'];
							
						}else{
							$autor = $_POST['autor'];
						}
												
						$cuerpo = "noexiste666";
					
						$multimedia= substr($fichero_subido, 2); // guardo ruta absoluta quitando los ..
						chmod($fichero_subido, 0777); // para poder borrarlo

						#lanzo la conexion de MYSQL server
						conecta($c);

						if($c==null){
							echo "Fallo en la conexion con la DB";
						}
						else{
							# selecciono mi base de datos
							$nombredb="proyectofinal";
							mysqli_select_db($c,$nombredb);


							$sql= "INSERT INTO articulos (id, titular, fecha, autor, copete, tema, cuerpo, multimedia) 
								VALUES (".$id.",'$titular','$fecha','$autor','$copete','$tema','$cuerpo','$multimedia')";
								
								
								
							echo $sql;
							$postnew=mysqli_query($c,$sql);
							
								if ($postnew)
									echo "TODO OK";
								else
									echo "fallo en el INSERT";

						}



					
				// cierro la conexion de la db
					mysqli_close($c);
						
						
					}else{
						echo "el titulo en blanco o archivo mal subido";
					}
			}


			}



		?>
		
		
		
		
		
		
		
		
		
		
		
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