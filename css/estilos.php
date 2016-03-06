<?php
    header("Content-type: text/css; charset: UTF-8");
    
    include_once ('../funciones.inc.php');
     
    $consulta="select * from configuracionweb where id=1";

    $tablaConfigValor = consultaConfiguracionDB ($consulta);

?>

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,900italic,900,700,400italic,500italic);

html {
  font-size: <?=$tablaConfigValor["tamanoLetra"]?>;
  background-color: <?=$tablaConfigValor["colorFondoWeb"]?>;
}
body {
    font-family:<?=$tablaConfigValor["tipoLetra"]?>;
    
}
h1, h2, h3, h4, h5, h6 {
    font-family: <?=$tablaConfigValor["tipoLetra"]?>;
}
h1{
	font-size:<?=$tablaConfigValor["tamanoTitulos"]?>;	
}
h5{
	font-size: 0.8rem;
}

#contenedor{
  
  width:<?=$tablaConfigValor["anchoWeb"]?>;
  margin: 0 auto;
  
  
}

#contenedor-post{
    margin:4%;
  
}



#notaAvisoLogin{
  text-align:right;
  
}

#accionesPanel{
  
  display:inline-flex;
  
}


#menuWeb{
	clear:both;
  
	
}

#barraMenu a{
  margin: 19px 23px;
    text-decoration: none;
    color:#000000;
    font-size:<?=$tablaConfigValor["tamanoMenuPrincipal"]?>;
 
}


#miAncla{
  
  position: absolute;

  
}


#idLogotipoImg {
   
  background: url('<?=$tablaConfigValor["rutaLogo"]?>');
  background-repeat: no-repeat;
  width:403px;
  height:161px;
}





.opcionesPanel img{
  float:left;
  margin-bottom: 15px;
}

.opcionesPanel a{
     clear: both;
    margin: 19px 23px;
    text-decoration: none;
    color:#000000;
    font-size:1.3rem;
}



#formularioPost{
  
  margin:auto;
  padding:0;
   width:950px;
  
  
}
#formularioPost label{
  display:block;
  margin-top:10px; 
  
}
#formularioPost input{
  margin-top:7px; 
  
}

.avisoFormulario{
  
  font-size:0.8rem;
  color:black;
  font-weight: bold;
}


.entradaOk{
	margin-top:10px;
	text-align: center;

}
.entradaOk a{
	margin-right:10px;
	text-align: center;

}

.entradaFail{
	margin-top:10px;
	text-align: center;

}
.entradaFail a{
	margin-right:10px;
	text-align: center;

}




#licenciaIDQ{
	text-align: center;

}




/***** CSS para la Galeria de Fotos ******/

.grayscale img
{
	filter: grayscale(1);
	-webkit-filter: grayscale(1);
	-moz-filter: grayscale(1);
	-o-filter: grayscale(1);
	-ms-filter: grayscale(1);
}

.grayscale img:hover
{
	filter: grayscale(0);
	-webkit-filter: grayscale(0);
	-moz-filter: grayscale(0);
	-o-filter: grayscale(0);
	-ms-filter: grayscale(0);
}


.fondo-negro{
	display: none;
	position: absolute;
	top: 0%;
	left: 0%;
	background-color:#000000;
	z-index:1001;
	-moz-opacity: 0.8;
	opacity:.80;
	filter: alpha(opacity=80);
  
}

.blanco-contenido {
	display: none;
	position: absolute;
	top: 25%;
	left: 25%;
	width: auto;
	height: auto;
	padding: 16px;
	border: 16px solid orange;
	background-color: white;
	z-index:1002;
	overflow: auto;
}




.btn {
  font-size: 0.9rem;
  float:right;
  margin:0
}


.miGaleria {
   display: -webkit-flex;
   display: flex;
   -webkit-flex-wrap: wrap;
   flex-wrap: wrap;
}
.miGaleria li{
   display: -webkit-flex;
   display: flex;
  
}





/******** END Efectos Galeria fotos ******/





/* Post normal */
.postNormal{
  
  margin-top:11px;
}


.lineaAutorPost{
    display:inline;
   
}
.publicadoPor{
  font-weight: bold;
  margin:0;
  padding:0;
  
}
.calendarioFecha{
   float:right;
   margin-bottom:5px;
}

.lineaSuperiorPost hr {
  clear:both;
  border: 1px solid red; 
  height: 2px; 
  width: 100%;
}
.titularNormal{
  display:inline-block;
  
}
.copeteNormal{
  font-style: italic;
  font-size: <?=$tablaConfigValor["tamanoCopete"]?>;
}
.cuerpoNormal{
  margin-top:0.25%;
  
}
.lineaFinPost hr {
  clear:both;
  border: 0 ; 
  border-top: 4px double black; 
  width: 100%;
  
}
.categoria{
  float:right;
  padding:1%;
  
}
.categoria img{
  margin-left:1px;
    margin-right:2px;
}
/* Fin Post normal */

/* Post Multimedia*/

.postMultimedia .titularNormal{
  display:block;
  
}
.miniaturaPortada {
 text-align:center;
 
}



/* cabecera LOGIN */


#logotipo{
  
 float:left; 
  
}

#loginForm{
  
  float:right;
  margin:4% 0 4% 4%;
  
}
#loginForm #userLogeado{
  
  display:inline;
  
}

#loginForm .btnPanel{
  
 margin-bottom:10px; 
}



.btnPanel a{
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  
  color: #ffffff;
 
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.btnPanel:hover a{
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}

/* final cabecera LOGIN*/

.btn-eliminar {
	
	background-image: url(".././images/delete-button.png");
	background-size: 24px 24px;/*cambia tamaño de la imagen de background*/
  	background-repeat: no-repeat;
	border: none;
	width:24px;
	height:24px;
}


.fotoPost {
	
	width: 11%;
    display: inline-flex;
    margin: 2%;
	
}


/********************* DESDE AQUI CSS SLIDE ********************/

#slides {
      display: none;
     margin-top:10px;	
    }

    #slides .slidesjs-navigation {
      margin-top:5px;
     
    }

    a.slidesjs-next,
    a.slidesjs-previous,
    a.slidesjs-play,
    a.slidesjs-stop {
      background-image: url(.././images/btns-next-prev.png);
      background-repeat: no-repeat;
      display:block;
      width:12px;
      height:18px;
      overflow: hidden;
      text-indent: -9999px;
      float: left;
      margin-right:5px;
    }

    a.slidesjs-next {
      margin-right:10px;
      background-position: -12px 0;
    }

    a:hover.slidesjs-next {
      background-position: -12px -18px;
    }

    a.slidesjs-previous {
      background-position: 0 0;
    }

    a:hover.slidesjs-previous {
      background-position: 0 -18px;
    }

    a.slidesjs-play {
      width:15px;
      background-position: -25px 0;
    }

    a:hover.slidesjs-play {
      background-position: -25px -18px;
    }

    a.slidesjs-stop {
      width:18px;
      background-position: -41px 0;
    }

    a:hover.slidesjs-stop {
      background-position: -41px -18px;
    }

    .slidesjs-pagination {
      margin: 7px 0 0 750px;
      
      list-style: none;
    }

    .slidesjs-pagination li {
      float: left;
      margin: 0 1px;
    }

    .slidesjs-pagination li a {
      display: block;
      width: 13px;
      height: 0;
      padding-top: 13px;
      background-image: url(.././images/pagination.png);
      background-position: 0 0;
      float: left;
      overflow: hidden;
    }

    .slidesjs-pagination li a.active,
    .slidesjs-pagination li a:hover.active {
      background-position: 0 -13px
    }

    .slidesjs-pagination li a:hover {
      background-position: 0 -26px
    }

    #slides a:link,
    #slides a:visited {
      color: #333
    }

    #slides a:hover,
    #slides a:active {
      color: #9e2020
    }

    .navbar {
      overflow: hidden
    }
/********************* HASTA AQUI CSS SLIDE ********************/



/********************* SLIDE RESPONSIVE ********************/

#slides {
      display: none
    }

.container {
      margin: 0 auto
    }

    /* For tablets  smart phones */
    @media (max-width: 767px) {
      body {
        padding-left: 20px;
        padding-right: 20px;
      }
      .container {
        width: auto
      }
    }

    /* For smartphones */
    @media (max-width: 480px) {
      .container {
        width: auto
      }
    }

    /* For smaller displays like laptops */
    @media (min-width: 768px) and (max-width: 979px) {
      .container {
        width: 724px;
		margin-top: 5px;	
      }
    }

    /* For larger displays */
    @media (min-width: 1200px) {
      .container {
        width: 1170px;
		margin-top: 10px;	
      }
    }
 
/********************* FIN SLIDE RESPONSIVE ********************/

