
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
			event.preventDefault;
			 var foto = $(this).attr("alt");
			
			$("#light").show( "slow" );
			$("#fade").show( "slow" );
			$("#fade").css('width', 'auto');
			$("#light").append("<img class='fotoGrandes' src=./uploads/fotos/"+foto+" alt="+foto+"  />");
		});
		$("#b-cerrar").click(function(event){
			event.preventDefault;
			$("#light").hide( 1000 );
			$("#fade").hide( 1000 );
			$('.fotoGrandes').remove(); 
						
			
		});
		
	
	
});





