<?php	session_start(); ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Panel Administracion - Nueva Entrada</title>
		<meta name="description" content="Panel Administracion de la web Mi Diario">
		<meta name="keywords" content="diario,blog personal,pensamientos">
		<meta name="author" content="Isaac Díez">
	<!-- CSS PERSONALIZADOS -->
		<link rel="stylesheet" href="../css/estilos.css"/>
	<!-- JS NECESARIOS -->	
		<script src="../js/jquery-2.1.4.min.js"></script>
		<script src="../js/configPost.js"></script>
	<!-- NECESARIO PARA EL EDITOR -->
		<script src="./ckeditor/ckeditor.js"></script>
		
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
			<? include_once ("./menuDeLaWebEnAdmin.inc.php")?>			
		</div>
	
		Insertar una entrada<br/>
		<div id="formularioPost">	
		<form method="post" action="./nuevaEntrada.php">
			<fieldset>
			<legend>Insertar Entrada Multimedia</legend>
			<label>Titular:</label><input type="text" id="titulo" name="titulo"  size="80" maxlength="80" /><br/>
			<label>Copete:</label><textarea id="copete" name="copete" rows="5" cols="80" maxlength="300">
			</textarea><br/>
			<label>Tema:</label>
						<select name="tema" id="tema">
						  <option value="Reflexiones">Reflexiones</option>
						  <option value="Viajes">Viajes</option>
						  <option value="Vivencias">Vivencias</option>
						  <option value="Pensamientos">Pensamientos</option>
			</select>
			
					<input type="hidden" id="fecha" name="fecha" value="<?=date('Y-m-d H:i:s')?>" />
			<label>Autor:</label><input type="text" id="autor" name="autor" size="20" maxlength="20"/><br/>
			<span class="avisoFormulario">* Opcional: Si no pones nada será "admin".</span>
			<label>Cuerpo:</label> 
			<textarea name="editor1" id="editor1" rows="10" cols="80">
               Escribe aquí lo que desees
            </textarea>
					
				<script>
						// Replace the <textarea id="editor1"> with a CKEditor
						// instance, using default configuration.
               			 CKEDITOR.replace( 'editor1' );
           		</script>
			<button name="bnt-post" id="btn-post">Insertar Entrada</button>
			
			</fieldset>
		</form>
		</div>
		<?php 
			if (isset ($_POST['bnt-post'])){
				if ( !isset ($_POST['titulo']) || !isset ($_POST['copete']) || !isset ($_POST['tema']) || !isset ($_POST['fecha']) || !isset ($_POST['autor']) || !isset ($_POST['editor1'])){

						echo "Fallo en el envio de datos de alta del post";	

					}
					else{
						$id = 0;
						$titular = $_POST['titulo'];
						$copete = $_POST['copete'];
						$tema = $_POST['tema'];
						$fecha = $_POST['fecha'];
						
						if ( $_POST['autor'] == ""){
							
							$autor = $_SESSION['login'];
							
						}else{
							$autor = $_POST['autor'];
						}
												
						$cuerpo = $_POST['editor1'];
					
						$multimedia="noexiste";
						

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



					}
				// cierro la conexion de la db
					mysqli_close($c);
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