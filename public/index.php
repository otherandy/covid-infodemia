<?php require "php-partials/db-conn.php"; ?>
<!doctype html>
<html lang="en">
	 <head>
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- Bootstrap CSS -->
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	    <style type="text/css">
	    	#ZonaImagen{
	    		display: block;
	    		margin: auto;
	    	}
	    	#padding10{
	    		padding: 12px;
	    		border-radius: 25px;
	    		text-align: center;
	    	}
	    	#padding30{
	    		padding-top: 50px;
	    		text-align: center;
	    	}
	    	#encabezado{
	    		text-align: center;
	    		font-weight: 400;
				font-size: 24px;
	    	}
	    	img {
				margin: auto;
				display: block;
			}
			#zonaDeFrase{
				margin-top: 20px;
				margin-bottom: 50px;
			}
			#iniciarsesion{
				color: rgba(36, 113, 163,.8);
				font-size: 16px;
			}
	    	#objetivo{
				color: rgb(21, 67, 96);
				font-weight: 400;
				font-size: 16px;
			}
			a{
				cursor:pointer;
			}
			
		</style>
	    <title>Buscador</title>

	    <script type="text/javascript">
	    	var imagen="https://webimages.iadb.org/Drupal_pantheon/2020-08/1-%281%29.png?VersionId=XywK8tvqUHQXXCyaEBVKRe13Alhvq4Bl";
	    	var paginaInformacion="acercaDe.html";
	    	var palabraABuscar="";
	    	var enlaceAResultados="search.php";

	    	function cambioLogo(){
				document.getElementById('logo').src=imagen;
	    	}
	    	function enlaces(){
				document.getElementById('objetivo').href=paginaInformacion;
	    	}
	    	function buscar(event){
	    			//le agregue algunas funciones basicas pero es necesario autenticar el
	    			//texto recibido para solo aceptar cadenas alfanumericas

	    		var tecla= event.key;
	    		if(tecla=="Enter"&&palabraABuscar==""){
	    			alert("Por favor introduzca al menos una palabra para realizar la busqueda");
	    		}
	    		else if(tecla=="Backspace" && palabraABuscar.length>0 ){
	    				palabraABuscar=palabraABuscar.substring(0, palabraABuscar.length - 1);
	    		}
	    		else if(tecla=="Backspace" && palabraABuscar.length==0 ){
	    				//no hace nada
	    		}
	    		else if(tecla=="Enter"){
					location.href = enlaceAResultados + '?q=' + palabraABuscar;
	    			//ir a la pagina de resultados de busqueda
	    		}
	    		else {
	    				palabraABuscar+=tecla;
	    		}
	    	}

	    	function isMobile(){
		    	return (
		        	(navigator.userAgent.match(/Android/i)) ||
		        	(navigator.userAgent.match(/webOS/i)) ||
		        	(navigator.userAgent.match(/iPhone/i)) ||
		        	(navigator.userAgent.match(/iPod/i)) ||
		        	(navigator.userAgent.match(/iPad/i)) ||
		        	(navigator.userAgent.match(/BlackBerry/i))
		    	);
			}
			
	    	function datosDePagina(){
	    		cambioLogo();
	    		enlaces();

	    	}
			function nuestroObjetivo(){
				location.href=paginaInformacion;
			}
			
	    </script>
	 </head>
  	<body class="row justify-content-center" onload="datosDePagina()">
	<?php require "php-partials/session.php"; ?>
		<div class="row justify-content-center">
			<div class="col-2" id="padding30"></div>
			<div class="col-12" id="Zonaimagen">
				<img src="" height="180" width="180" id="logo">
			</div>
			
			<div class="col-2"></div>
			<div class="col-8" id="zonaDeFrase">
				<h6 class="display-6" id="encabezado">Juntos para evitar la desinformaci??n</h6>
			</div>
			<div class="col-2"></div>
			<div class="col-3"></div>
			<div class="col-6">
			    <input type="text" class="form-control" placeholder="Introduce la busqueda y oprime la tecla enter" aria-label="Recipient's username" aria-describedby="basic-addon2" id="padding10" onkeyup="buscar(event)">	
			</div>
			<div class="col-3"></div>
			<div class="col-3"></div>
			<div class="col-6" id="padding30">
				<div class="row justify-content-center">
			   		<div class="col-5" id="movil1">
			   			<a class="display-6" id="objetivo" href="" onclick="nuestroObjetivo()">Nuestro objetivo</a>
			   		</div>
			   	</div>
			</div>
			<div class="col-3"></div>

			</div>
  		
			
		</div>


    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>