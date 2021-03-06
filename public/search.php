<?php require "php-partials/db-conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
	 <head>
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- Bootstrap CSS -->
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	    <style type="text/css">
	    	#objetivo{
	    		color: rgb(21, 67, 96);
				font-weight: 400;
				font-size: 18px;
				font-family: sans-serif;
				color: rgb(0, 74, 124);
				
	    	}
	    	#columnaMargen{
	    		text-align: center;
	    		margin-top: 10px;
	    	}
	    	#centrado{
				display:block;
				margin-left: auto;
	  			margin-right: auto;

			}
			#barraBusquedas{
				border-radius: 20px;
				text-align: center;
			}
			a{
				cursor:pointer;
			}
			#columnaResutado{
				margin-top: 20px;
				margin-bottom: 20px;
			}
			#zonaResultados{
				margin-top: 20px;
				margin-bottom: 20px;
			}
			#TituloResultado{
				cursor:pointer;
				font-weight: 400;
				font-size: 20px;
				margin: 0;
			}
			#fecha{
				font-size: 14px;
				margin-bottom: 12px;
				padding: 0;
			}
			#resumen{
				text-align: justify;
				font-size: 16px;
			}
			img{
				margin-bottom: 10px;
				height: 100px;
				display: block;
			}
			#video{
				margin-bottom: 10px;
			}
			#contenedorMiniatura{
				height: 100px;
			}
			#separacionResultado{
				margin-bottom: 30px;
			}
			#iniciarSesion{
				font-size: 16px;
			}

		</style>
	    <title>Resultados</title>
		<?php require "php-partials/session.php"; ?>

	    <script type="text/javascript">
	    	class Resultado{
				Resultado(titulo,fecha,resumen,enlaceAlResumen,imagen,video){
					this.titulo=titulo;
					this.fecha=fecha;
					this.resumen=resumen;
					this.enlaceAlResumen=enlaceAlResumen;
					this.video="";
					this.imagen="";
				}
			}
			//var nombreUsuario="Federico@uabc.edu.mx";
			var listaDeResultados=[];
			var imagen="https://webimages.iadb.org/Drupal_pantheon/2020-08/1-%281%29.png?VersionId=XywK8tvqUHQXXCyaEBVKRe13Alhvq4Bl";
	    	//var enlaceAInicioSesion="resultadosdebusqueda.html";
	    	var paginaInformacion="acercaDe.html";
	    	var palabraABuscar="";
	    	var enlaceAResultados="search.php";
	    	//var enlaceResumen="contenidodelresumen.html";
			//var enlaceAInicioSesion="resultadosdebusqueda.html";
			//var sesionIniciada=false;
			
		
			/*
			for (var i = 0; i< 10; i++) {
				
				var r= new Resultado(",",",",",");
				r.enlaceAlResumen=enlaceResumen;
				r.titulo="Miocarditis fulminante por COVID-19";
				if(i==9||i==2){
					r.imagen="1";
					r.video="https://www.youtube.com/embed/oYpdnfg2Wko";
					r.fecha="junio 2020";
					r.resumen="La fisiopatolog??a de este virus contin??a siendo desconocida. M??ltiples estudios indican que los pacientes infectados por COVID-19 ttienen altas concentraciones de interleucina (IL) ";
				}
				else if(i%3==0){
					r.imagen="https://www.cancer.org/content/dam/cancer-org/images/photographs/objetcs/medical/coronavirus-cdc-illustration.jpg/jcr:content/renditions/cq5dam.web.1280.1280.jpeg";
					r.video="https://www.youtube.com/embed/rLOWYCpz3AU";
					r.fecha="Mayo 2019";
					r.resumen="beta, interfer??n (IFN) gamma, prote??na 10 inducible por IFN (IP) y prote??na quimiot??ctica monocitaria (MCP) 1. Se ha demostrado que los pacientes m??s graves tienen ";
				}
				else if(i%2==0){
					r.video="1";
					r.imagen="1";
					r.fecha="Agosto 2000";
					r.resumen="La fisiopatolog??a de este virus contin??a siendo desconocida. M??ltiples estudios indican que los pacientes infectados por COVID-19 ttienen altas concentraciones de interleucina (IL) 1 beta, interfer??n (IFN) gamma, prote??na 10 inducible por IFN (IP) y prote??na quimiot??ctica monocitaria (MCP) 1. Se ha demostrado que los pacientes m??s graves tienen ";
				}
				else{
					r.imagen="https://www.paho.org/sites/default/files/card/2021-03/covid-19-virus-aqua-bk.jpg";
					r.video="1";
					r.fecha="diciembre 2019";
					r.resumen="La fisiopatolog??a de este virus contin??a siendo desconocida. M??ltiples estudios indican que los pacientes infectados por COVID-19 ttienen altas concentraciones de interleucina (IL) 1 beta, interfer??n (IFN) gamma, prote??na 10 inducible por IFN (IP) y prote??na quimiot??ctica monocitaria (MCP) 1. Se ha demostrado que los pacientes m??s graves tienen efjfhfnl??mlmfkngnkregnkre   fkrniojtijfmewf f fiefni4ti3mfmfinfkned fiowernhurjiemopewmwqmqw";
				}
				
				listaDeResultados.push(r);
			}
			*/
			
			
			var result = document.getElementById('resultados');
			
			function irAResumen(url){
				console.log(url);
				location.href=url;
			}
			
			/*
			function incioDeSesion(){
				if(sesionIniciada==false){
				location.href=PAginaInicioDeSesion;
				}
				
			}*/

			function busqueda(){
				//document.getElementById('iniciarSesion').href=enlaceAInicioSesion;
				document.getElementById('objetivo').href=paginaInformacion;
				//if(sesionIniciada){
				//	document.getElementById('iniciarSesion').innerHTML= `<a class="display-6" id="iniciarSesion" href="" onclick="">${nombreUsuario}</a>`;
				//}
				
				const mostrarResultados=document.querySelector('#zonaResultados');
				if(listaDeResultados.length===0 ){
					alert("No se encontro ningun resumen");
					
				}
				else{
					
					for (var i = 0 ; i <listaDeResultados.length ; i++) {
						if(listaDeResultados[i].video!= null && listaDeResultados[i].imagen!= null){
							mostrarResultados.innerHTML+=	`
								<div class="shadow-sm p-3 mb-5 bg-body rounded" id="separacionResultado">
									<div class="row justify-content-center">
										<div class="col-12">
											<p class="lead" id="TituloResultado"  onclick="irAResumen('${listaDeResultados[i].enlaceAlResumen}')">
												${listaDeResultados[i].titulo}
											</p>
											<p class="lead" id="fecha">
					  							${listaDeResultados[i].fecha}
											</p>
											<p class="lead" id="resumen">
					  							${listaDeResultados[i].resumen}
											</p>
											<div class="container" id="contenedorMiniatura">
												<div class="row justify-content-center">
													<div class="col" id="contenedorMiniatura">
														<img src="${listaDeResultados[i].imagen}" height="100" > 
													</div>
													<div class="col" id="contenedorMiniatura" >
														<iframe width="200" height="100" src="${listaDeResultados[i].video}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id="video" >
														</iframe>
													</div>
												</div>
											</div>	
												
										</div>
									</div>
								</div>
								`;
						}
						else if (listaDeResultados[i].video== null && listaDeResultados[i].imagen!= null) {
							mostrarResultados.innerHTML+=	`
								<div class="shadow-sm p-3 mb-5 bg-body rounded" id="separacionResultado">
									<div class="row justify-content-center">
										<div class="col-12">
											<p class="lead" id="TituloResultado" onclick="irAResumen('${listaDeResultados[i].enlaceAlResumen}')">
					  							${listaDeResultados[i].titulo}
											</p>
											<p class="lead" id="fecha">
					  							${listaDeResultados[i].fecha}
											</p>
											<p class="lead" id="resumen">
					  							${listaDeResultados[i].resumen}
											</p>
											<div class="container" id="contenedorMiniatura">
												<div class="row justify-content-center">
													<div class="col" id="contenedorMiniatura">
														<img src="${listaDeResultados[i].imagen}" height="100" > 
													</div>
												</div>
											</div>	
												
										</div>
									</div>
								</div>
								`;
						}
						else if (listaDeResultados[i].video!= null && listaDeResultados[i].imagen== null){
							mostrarResultados.innerHTML+=	`
								<div class="shadow-sm p-3 mb-5 bg-body rounded" id="separacionResultado">
									<div class="row justify-content-center">
										<div class="col-12">
											<p class="lead" id="TituloResultado" onclick="irAResumen('${listaDeResultados[i].enlaceAlResumen}')">
					  							${listaDeResultados[i].titulo}
											</p>
											<p class="lead" id="fecha">
					  							${listaDeResultados[i].fecha}
											</p>
											<p class="lead" id="resumen">
					  							${listaDeResultados[i].resumen}
											</p>
											<div class="container" id="contenedorMiniatura">
												<div class="row justify-content-center">
													<div class="col" id="contenedorMiniatura" >
														<iframe width="200" height="100" src="${listaDeResultados[i].video}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id="video" >
														</iframe>
													</div>
												</div>
											</div>	
												
										</div>
									</div>
								</div>
								`;
						}
						else{
							mostrarResultados.innerHTML+=	`
								<div class="shadow-sm p-3 mb-5 bg-body rounded" id="separacionResultado">
									<div class="row justify-content-center">
										<div class="col-12">
											<p class="lead" id="TituloResultado" onclick="irAResumen('${listaDeResultados[i].enlaceAlResumen}')">
					  							${listaDeResultados[i].titulo}
											</p>
											<p class="lead" id="fecha">
					  							${listaDeResultados[i].fecha}
											</p>
											<p class="lead" id="resumen">
					  							${listaDeResultados[i].resumen}
											</p>
										</div>
									</div>
								</div>
								`;
						}
					}
				}
			}
			/*
			function presionarBuscar(){
					alert("has buscado");
			}
			function llenadoDeFormulario(palabra){
			}

			function verResumen(link){
					alert("usted desea ir a "+ link.toS);
			}*/
	    	
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
	    		console.log(palabraABuscar);
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
	    </script>
		
		<?php
          $consulta = "select * from etiquetas_de_resumen,etiquetas e,resumenes r where e.nombre like '" . $_GET['q'] . "' and etiquetas_id=e.id and resumenes_id=r.id";
          if ($ejecutar = $conn->query($consulta)) :
            $rows = mysqli_num_rows($ejecutar);
            while ($fila = $ejecutar->fetch_assoc()) : ?>
			<script type="text/javascript">
				var r= new Resultado();
				r.enlaceAlResumen='preview.php?id=' + <?php echo json_encode($fila['resumenes_id']); ?> + '&q=' + <?php echo json_encode($_GET['q']); ?>;
				r.titulo = <?php echo json_encode($fila['titulo']); ?>;
				r.resumen = <?php echo json_encode($fila['resumen']); ?>;
				r.imagen= <?php echo json_encode($fila['imagen']); ?>;
				r.video= <?php echo json_encode($fila['video']); ?>;
				//r.imagen="https://www.cancer.org/content/dam/cancer-org/images/photographs/objetcs/medical/coronavirus-cdc-illustration.jpg/jcr:content/renditions/cq5dam.web.1280.1280.jpeg";
				//r.video="https://www.youtube.com/embed/rLOWYCpz3AU";
				r.fecha = <?php echo json_encode($fila['fecha_creacion']); ?>;
				
				listaDeResultados.push(r);
			</script>
        <?php
            endwhile;
          endif; ?>
		  
	 </head>

  	<body class="row justify-content-center" onload="busqueda()">
	
  		<div class="col-3" id="columnaMargen">
  			<a class="display-6" onclick="" id="objetivo">Nuestro objetivo</a>
  		</div>
  		<div class="col-5"></div>
		
		<div class="col-4" id="columnaMargen">
			<!--<a class="display-6" id="iniciarSesion" href="" onclick="">inciar sesion</a>-->
		</div>

		<div class="col-3" id=></div>
		<div class="col-6" id="centrado">
			<input type="text" class="form-control" placeholder="Introduce una nueva busqueda y pulsa enter" aria-label="Recipient's username" aria-describedby="basic-addon2" id="barraBusquedas" onkeyup="buscar(event)">
		</div>
		<div class="col-3"></div>
		<div class="col-1" id="columnaResutado" ></div>
		<div class="col-10" id="zonaResultados">
			
			
			
		</div>
		<div class="col-1" id="columnaResutado"></div>

		
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous" ></script>
  </body>
</html>
