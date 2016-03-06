<?php
	$directorioSlides ="./uploads/fotos/slides/";
	$directorioFotos="./uploads/fotos/";
	$multimedia =$registro['multimedia'];
	$estruturaLink = explode("/",$multimedia);
	$estrucuraDirectorio= "/".$estruturaLink[1]."/".$estruturaLink[2]."/";
	$archivo = $estruturaLink[3];
?>

<div class="postMultimedia">
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
	<a href="./<?=$directorioFotos.$archivo?>" target="_blank">
		<div class="miniaturaPortada"><img src="./<?=$directorioSlides.$archivo?>" alt="<?=$archivo?>" width="450" height="337"/></div>
	</a>	
	<div class="categoria">Categoria<img src="./images/icon-hash-tag-16.png" alt="hash-tag" /><?=$registro['tema']?></div>
	<div class="lineaFinPost"><hr/></div>	
</div>



