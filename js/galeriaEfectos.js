
/**** AUMENTAR TAMAÑO THUMNAILS ****/

$(document).ready(function() {
	
     	 $(".escala").mouseover(function(event){
			 event.preventDefault()
			 	var imagen = $('.escala');
				var ancho = imagen.width();
				var alto = imagen.height();
			 	alto=alto*1.3; 	
			 	ancho=ancho*1.3; 
				$(this).css({ 'width':ancho+"px", 'height':alto+"px" });
			});
	
		$(".escala").mouseout(function(event){
					event.preventDefault;
			 		$(".escala").css('width', 'auto');		
					$(".escala").css('height', 'auto');		
			});
	
		$(".escala").click(function(event){
			
			//event.preventDefault;
			var foto = $(this).attr("alt");
			var anchoPantalla =  $(window).width();
			var altoPantalla = $(window).height();
			$('.fondo-negro').css({width : anchoPantalla+"px",height : altoPantalla+"px"});
			var id1 = event.target.id;
			
		 
       			$("#light"+id1).show( "slow" );
			  	$("#light"+id1).append("<img class='fotoGrandes' src=./uploads/fotos/"+foto+" alt="+foto+"  />");
       			$("#fade"+id1).show( "slow" );
       	 
		});
	
		$(".btn").click(function(event){
			//event.preventDefault;
			var id2 = event.target.id;
			var resultadoID = id2.split("-");
			var idActivo = resultadoID[1];
			$("#light"+idActivo).hide( 1000 );
			$("#fade"+idActivo).hide( 1000 );
			$('.fotoGrandes').remove(); 
						
			
		});
		
	
	
});



