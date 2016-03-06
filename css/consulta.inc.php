<?php


	include (".././mysql.inc.php"); // datos conexion DB


	$config = array ();
	
    
    conecta($c);
    
    
 
	if($c==null){
		     echo "error en la conexion con la DB";
	}
	else{
            $nombredb="proyectofinal";
					  mysqli_select_db($c,$nombredb);
            
            $sql="select * from configuracionweb where id=1";
            $resultado=mysqli_query($c,$sql);
             
		        
		      if($resultado){
            
              
					 $filas=mysqli_affected_rows($c);



					  if($filas = 0 || $filas == null){

						 echo "error en la conexion con la DB";
					  }
					  else{

						while($registro = mysqli_fetch_array($resultado)){
						 	array_push ( $config, $registro['tamanoLetra']);
							array_push ( $config, $registro['tipoLetra']);
							
							
						}
					   
					}

				  }
      		}
      
    mysqli_close($c);

?>
