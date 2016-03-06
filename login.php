<?php
	session_start();

	
				
		if (isset ($_POST['login']) && isset ($_POST['pass'])){
			
				$usuarioLogin = $_POST['login'];
				$password = md5($_POST['pass']);
			
				echo $usuarioLogin;
				echo $password;
			
				
				include_once ("funciones.inc.php"); // funciones y conexion con la DB
				
				#lanzo la conexion de MYSQL server
				conecta($c);
			
			
			if($c==null){
					echo "Fallo en la conexion con la DB";
				}
				else {
					
					# selecciono mi base de datos
					$nombredb="proyectofinal";
					mysqli_select_db($c,$nombredb);
					// aqui vienen los comandos SQL 
					
						$sql="SELECT login FROM usuarios WHERE login = '$usuarioLogin'"; 
						
						#para que tenga en cuenta caracteres especiales UTF8 hay que poner antes 
						mysqli_query($c,"SET NAMES 'utf8'");
						# ejecuto la orden SQL
						$nombreEsta=mysqli_query($c,$sql);
					
						if($nombreEsta){
									
									$comparacion=mysqli_affected_rows($c);
						
								if($comparacion == 0 || $comparacion == null){
										echo "ERROR EL USUARIO NO EXISTE EN LA DB";
										# como indicar que no esta registrado y ha de hacerlos javascript????
								}
								else {
									
									# selecciono todos los datos del usuario
									$sql2="SELECT * FROM usuarios WHERE login = '$usuarioLogin'"; 
									mysqli_query($c,"SET NAMES 'utf8'");
									# ejecuto la orden SQL
									$resultado=mysqli_query($c,$sql2);
									
									#los datos del usuario en un array asociativo
									$datosUsuario = mysqli_fetch_array($resultado);
																
									
										if ($datosUsuario['pass'] == $password){
											#Contraseña correcta logeado y creo las variables de session
												$_SESSION['login'] = $usuarioLogin;
												$_SESSION['logeado'] = true;
												$_SESSION['urllogin']= $_SERVER["REQUEST_URI"];
												
										}
										else{

											echo "Pass del usuario incorrecto";	
										}
								
									}	
					 		}
			
			
			
					}
		}
		else{
			echo ("No recibi todos los datos necesarios login y pass");
			### habria que redirigir al index o mostrar al usuario que no hay conexion con la DB y lo de pass incorrecto donde y como	
			
		}

					
			
			
		  header("Location:./panelControl/panel.php");
			
		
		
			
		?>