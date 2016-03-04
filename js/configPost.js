/*
Archivo creado por: Isaac Díez Quiroga
Fecha:2016-03-01
Funciones JQuery y Javascript para entradas posts

*/

/** EFECTOS EN MENU DE NAVEGACIÓN**/
 $(document).ready(function() {
     	 $("#homeMenu a").mouseover(function(){
				$("#homeMenu a").css("color", "#d70027");
				$('#homeMenu img').attr('src','./images/icon-home-32-red.png');
			});
		$("#homeMenu a").mouseout(function(){
				$("#homeMenu a").css("color", "#000000");
				$('#homeMenu img').attr('src','./images/icon-home-32.png');
			});
		
	  	$("#galeriaMenu a").mouseover(function(){
				$("#galeriaMenu a").css("color", "#d70027");
				$('#galeriaMenu img').attr('src','./images/icon-galeria-32-red.png');
			});
		$("#galeriaMenu a").mouseout(function(){
				$("#galeriaMenu a").css("color", "#000000");
				$('#galeriaMenu img').attr('src','./images/icon-galeria-32.png');
			});
	 	 $("#multimediaMenu a").mouseover(function(){
				$("#multimediaMenu a").css("color", "#d70027");
				$('#multimediaMenu img').attr('src','./images/icon-multimedia-32-red.png');
			});
		$("#multimediaMenu a").mouseout(function(){
				$("#multimediaMenu a").css("color", "#000000");
				$('#multimediaMenu img').attr('src','./images/icon-multimedia-32.png');
			});
});

/** FIN EFECTOS NAVEGACION **/


/*** EL ANCHA **/

$(document).ready(function(){

			$('#miAncla').click(function(e){
				e.preventDefault();
				$('html, body').stop().animate({scrollTop: $($(this).attr('href')).offset().top}, 1000);

			})
			/* si hay scroll que aparezca ancla */
			$(window).scroll(function() {
				$('#miAncla').show();
				var separacionFondoPantalla = $(window).height() - 90;
				var separacionEnAncho =  $(window).width() - 90;
				
				$('#miAncla').css('top', $(this).scrollTop() + separacionFondoPantalla + "px");
				$('#miAncla').css("left", separacionEnAncho);
				/* si estas en el tope de la web desaparece el ancla */
				if ($(window).scrollTop() <= 10)
                    $('#miAncla').hide();
			});
	
			
	
	
	
});
/** FIN ANCLA **/














