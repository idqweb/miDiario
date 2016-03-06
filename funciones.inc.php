<?php

$mysql_server="localhost";		
$mysql_login="root";			  
$mysql_pass="admin";			  
$c;

function conecta(&$c){

    // para usar las variables anteriores en la funcion
    // debo de definirlas como globales
    global $mysql_server, $mysql_login, $mysql_pass;

    if($c=mysqli_connect($mysql_server,$mysql_login,$mysql_pass)){
          // todo correcto
    }else{
	  echo "<br/>No ha podido realizarse la conexión a la BD<br/>";	
    }
}


function actualizaDB ($tamanoLetra,$tipoLetra){
			conecta($c);
			
			$nombredb="proyectofinal";
	
			mysqli_select_db($c,$nombredb);
        	$sql="UPDATE configuracionweb SET id=1,tamanoLetra='$tamanoLetra',tipoLetra='$tipoLetra' WHERE id=1";
            $resultado=mysqli_query($c,$sql);
	 		mysqli_close($c); //cierro la conexion con la db
}






?>