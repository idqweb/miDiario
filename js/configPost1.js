/*
Archivo creado por: Isaac Díez Quiroga
Fecha:2016-03-01
Funciones JQuery y Javascript para entradas posts

*/

/** EFECTOS EN MENU DE NAVEGACIÓN**/
 $(document).ready(function() {
     	 $("#homeMenu a").mouseover(function(){
				$("#homeMenu a").css("color", "#d70027");
				$('#homeMenu img').attr('src','../images/icon-home-32-red.png');
			});
		$("#homeMenu a").mouseout(function(){
				$("#homeMenu a").css("color", "#000000");
				$('#homeMenu img').attr('src','../images/icon-home-32.png');
			});
		
	  	$("#galeriaMenu a").mouseover(function(){
				$("#galeriaMenu a").css("color", "#d70027");
				$('#galeriaMenu img').attr('src','../images/icon-galeria-32-red.png');
			});
		$("#galeriaMenu a").mouseout(function(){
				$("#galeriaMenu a").css("color", "#000000");
				$('#galeriaMenu img').attr('src','../images/icon-galeria-32.png');
			});
	 	 $("#multimediaMenu a").mouseover(function(){
				$("#multimediaMenu a").css("color", "#d70027");
				$('#multimediaMenu img').attr('src','../images/icon-multimedia-32-red.png');
			});
		$("#multimediaMenu a").mouseout(function(){
				$("#multimediaMenu a").css("color", "#000000");
				$('#multimediaMenu img').attr('src','../images/icon-multimedia-32.png');
			});
});

/** FIN EFECTOS NAVEGACION **/


/** EFECTOS SELECCIONAR OPCION**/
 $(document).ready(function() {
     	 $("#panelEdit a").mouseover(function(){
				$("#panelEdit a").css("color", "#58962C");
				$('#panelEdit img').attr('src','../images/img-newPost-180-verde.png');
			});
		$("#panelEdit a").mouseout(function(){
				$("#panelEdit a").css("color", "#000000");
				$('#panelEdit img').attr('src','../images/img-newPost-180.png');
			});
		
	  	$("#panelFoto a").mouseover(function(){
				$("#panelFoto a").css("color", "#58962C");
				$('#panelFoto img').attr('src','../images/img-newMultimedia-180-verde.png');
			});
		$("#panelFoto a").mouseout(function(){
				$("#panelFoto a").css("color", "#000000");
				$('#panelFoto img').attr('src','../images/img-newMultimedia-180.png');
			});
	 	 $("#panelList a").mouseover(function(){
				$("#panelList a").css("color", "#58962C");
				$('#panelList img').attr('src','../images/img-listado-180-verde.png');
			});
		$("#panelList a").mouseout(function(){
				$("#panelList a").css("color", "#000000");
				$('#panelList img').attr('src','../images/img-listado-180.png');
			});
	  	$("#panelConf a").mouseover(function(){
				$("#panelConf a").css("color", "#58962C");
				$('#panelConf img').attr('src','../images/img-config-180-verde.png');
			});
		$("#panelConf a").mouseout(function(){
				$("#panelConf a").css("color", "#000000");
				$('#panelConf img').attr('src','../images/img-config-180.png');
			});
});

/** FIN EFECTOS NAVEGACION **/

/****** limpiar textAREAS *********/
$(document).ready(function() {


		$("#editor1")
		  .focus(function() {
				CKEDITOR.instances.editor1.setData('');
		  })
		  


});
/****** fin textAREAS *********/



