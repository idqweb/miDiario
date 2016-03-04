<tr>
<td><?=$registro['fecha']?></td><td><?=$registro['titular']?></td>
<td><?=$registro['autor']?></td><td><?=$registro['tema']?></td><td>							
	<form  method="post" action="listadoEntradas.php">
			<button class="btn-eliminar" type="submit" name="borrar" value="<?php echo $registro['id'];  ?>"></button>
			<input type="hidden" name="multimedia" value="<?php echo $registro['multimedia'];  ?>">					
	</form>
</td>	
</tr>
