<div class="postNormal">
	<div class="lineaAutorPost">
		<span class="publicadoPor">Publicado por:</span>
		<span class="autor"><?=$registro['autor']?></span>
		<div class="calendarioFecha">
			<img src="./images/icon-calendar-32.png" alt="calendario" />
			<?php echo date("d-m-Y",strtotime($registro['fecha']));?>
		</div>
		
	</div>
	<div class="lineaSuperiorPost"><hr/></div>	
	<div class="titularNormal"><h1><?=$registro['titular']?></h1></div>
	<div class="copeteNormal"><?=$registro['copete']?></div>
	<div class="cuerpoNormal"><?=$registro['cuerpo']?></div>
	<div class="categoria">Categoria<img src="./images/icon-hash-tag-16.png" alt="hash-tag" /><?=$registro['tema']?></div>
	<div class="lineaFinPost"><hr/></div>	
</div>	