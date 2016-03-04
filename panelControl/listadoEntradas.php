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
		<link rel="stylesheet" href="../css/estiloTablas.css"/>
	<!-- JS NECESARIOS -->	
		<script src="../js/jquery-2.1.4.min.js"></script>
	<!-- NECESARIO PARA EL EDITOR -->
		<script src="./ckeditor/ckeditor.js"></script>
		
	</head>
	<body>
		
		<!-- Archivos externos -->
		<?php
			include ("../mysql.inc.php"); // datos conexion DB
			include ("../funciones.inc.php"); // funciones de la web
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
				<?=include_once ("./menuDeLaWebEnAdmin.inc.php")?>			
			</div>
	
		Listado de las entradas<br/>
		
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
							// añadir el campo null por si se le ocurre consultar con el listado vacío
							echo "No hay articulos";
						}
						else{
							
							?>
			
							<table border="1" id="mitabla">
									<tr>
										<td>Fecha</td><td>Titular<td>Autor</td><td>Tema</td><td>Eliminar</td>		
									</tr>	
							
							<?php
							
							
							
							while($registro = mysqli_fetch_array($resultado)){
								//para cambiar la fecha a dia-mes-year se usa strtotime
								//echo date("d-m-Y",strtotime($registro['fecha']));
							
			
							include ("./tablaListado.inc.php");
							
							
				
		
							}
							
							
						?>	
							</table>	
						<?php	
							
							
						}
						
					}
					else{
							#orden SQL incorrecta
							#incluido el fallo de clave duplicada Duplicate Key
							$error=mysqli_error($c);
							echo $error;
					}
					
					if (isset($_POST['borrar'])){
									
									$refID = $_POST['borrar'];
									$multimedia =$_POST['multimedia'];
									//borrar archivo multimedia fisicamente
									if($multimedia != "noexiste"){
										$estruturaLink = explode("/",$multimedia);
										$archivoBorrar = $estruturaLink[3];
										$directorio = "/uploads/fotos/";
										$directorioSlides="/uploads/fotos/slides/";
										$directorioThumbnails="/uploads/fotos/thumbnails/";
										unlink("..".$directorio.$archivoBorrar); // orden de borrado
										unlink("..".$directorioSlides.$archivoBorrar); // orden de borrado slides
										unlink("..".$directorioThumbnails.$archivoBorrar); // orden de borrado thumbnails
									}
										
									
						
						
									
									$sql1="DELETE  FROM articulos WHERE id='$refID'"; 
									
									
										
									mysqli_query($c,"SET NAMES 'utf8'");
										# ejecuto la orden SQL
										mysqli_query($c,$sql1);
									header ("Location: listadoEntradas.php");
									
									
								}
					
					
					
					
							
					//esto lo hacemos para aprender lo normal no es cerrar aqui
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