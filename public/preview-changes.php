<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Aprovar Resumen</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	</head>

	<?php require "php-partials/db-conn.php";?>

	<style type="text/css">
	    #margenCH{
			height: 10px;
		}
		#margenM{
			height: 30px;
		}
		#margenG{
			height: 60px;
		}
		#titulo{
			text-align: center;
			font-weight: 400;
			font-size: 35px;
		}
		#autor{
			text-align: center;
			font-size: 20px;
			color: rgb(33, 97, 140);
		}
		#fecha{
			text-align: center;
			font-size: 16px;
		}
		#resumen{
			
			text-align: justify;
		}
		#centrado{
			display:block;
			margin-left: auto;
	  		margin-right: auto;
		}
		.roundedfloat-start{
	    	display: block;
			margin-left: auto;
			margin-right: auto;
			width: 70%;
			height: auto;
			border-radius: 10px;
		}
	    #btnimg{
	    	display: block;
			margin-left: auto;
			margin-right: auto;
			width: 70%;
			height: auto;
			border-radius: 10px;
		}
    	#contenedorImagenes{
	    	padding-left: 20px;
	    	padding-right: 20px;
	    	padding-top: 10px;
	    	padding-bottom: 10px;
	    	align-items: stretch;
	    }
	    #exampleFormControlTextarea1{
	    	height: 185px;
	    	color: rgb(2, 40, 83 );		
	    }
	    #instruccionesresumen{
			text-align: center;
	    	font-size: 20px;
	    	font-weight: 500;
	    	color: rgb(2, 40, 83 );
	    }
	    #botonGuardarResumen{
	    	padding-left: 30px;
			padding-right: 30px;
	    }
	</style>
	<?php
	session_start();
	?>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript">

			var imagenes=[
			"https://multimedia.elsevier.es/PublicationsMultimediaV1/item/multimedia/thumbnail/S0300893220301743:gr1.jpeg?xkr=ue/ImdikoIMrsJoerZ+w95VGOQIPAvopuSI6ycxV2xQ=",
			"https://multimedia.elsevier.es/PublicationsMultimediaV1/item/multimedia/thumbnail/S0300893220301743:gr2.jpeg?xkr=ue/ImdikoIMrsJoerZ+w95VGOQIPAvopuSI6ycxV2xQ=",
			];
			//var tautor="Ángela Irabien-Ortiz";

			var listaDeVideos=[
			"https://www.youtube.com/embed/jIO0PV0sqKk",
			"https://www.youtube.com/embed/3OSCZSDUrP8"
			];

			var enlaceAlArticulo="https://facebook.com";
			var enlaceARequests="requests.php";

			function mostrarImagenes(imagenes){
				const contenedorImagenes=document.querySelector('#contenedorImagenes');
				for (var i = 0; i < imagenes.length; i++) {
					contenedorImagenes.innerHTML+=`
					<div class="col-6" id="${imagenes[i]}"><img src="${imagenes[i]}" class="roundedfloat-start" >
						<button type="button" class="btn btn-dark" onclick="eliminarImagen('${imagenes[i]}')" id="btnimg")">ELIMINAR IMAGEN</button>
					</div>`;

				}
			}

			function mostrarvideos(videos){
				const contenedorVideos=document.querySelector('#videos');
				for (var i = 0; i < videos.length; i++) {
					contenedorVideos.innerHTML+=`
				<div class="col-12" id="${videos[i]}">
					<div class="row justify-content-center" >
						<div class="col-2" ></div>
						<div class="col-2" >
							<button type="button" class="btn btn-dark" onclick="eliminarVideo('${videos[i]}')">ELIMINAR VIDEO</button>
						</div>
						<div class="col-4" >
							<iframe width="560" height="315" src="${videos[i]}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen >
							</iframe>
						</div>
						<div class="col-4" ></div>
					</div>
				</div>`;

				}
			}

			function cargarResumenYTitulos(textoResumen,textAutor,textFecha,textTitulo){
				const contenedorResumen=document.querySelector('#resumen');
				const contenedorAutor=document.querySelector('#autor');
				const contenedorFecha=document.querySelector('#fecha');
				const contenedortitulo=document.querySelector('#titulo');
				contenedorResumen.innerHTML+=textoResumen;
				contenedorAutor.innerHTML+=textAutor;
				contenedorFecha.innerHTML+=textFecha;
				contenedortitulo.innerHTML+=textTitulo;
			}

			function cargarDatos(){
				cargarResumenYTitulos(resuemnDado,tautor,tfecha,ttitulo);
				mostrarImagenes(imagenes);
				mostrarvideos(listaDeVideos);
				
			}
			
			function irAlArticulo(){
				location.href=enlaceAlArticulo;
			}

			function guardarResumen(){
				var nuevoResumen=document.getElementById('exampleFormControlTextarea1').value;
				document.getElementById("resumen").innerHTML=nuevoResumen;
				resuemnDado = nuevoResumen;
			}

			function eliminarImagen(idimg){
				elemento=document.getElementById(idimg);
				document.getElementById('contenedorImagenes').removeChild(elemento);
				var imgs=[];
				for (var i = 0; i < imagenes.length; i++) {
					if(imagenes[i]!=idimg){imgs.push(imagenes[i]);} 
				}
				imagenes=imgs;
			}

			function eliminarVideo(vid){
				elemento=document.getElementById(vid);
				document.getElementById('videos').removeChild(elemento);
				var vids=[];
				console.log(listaDeVideos.length);
				for (var i = 0; i < listaDeVideos.length; i++) {
					if(listaDeVideos[i]!=vid){vids.push(listaDeVideos[i]);} 
				}
				listaDeVideos=vids;
				console.log(listaDeVideos.length);
			}

			function Regresar(){
				location.href = enlaceARequests;
			}

			function aprobar(approvar){
				$.ajax({
            		type : "POST",  //type of method
            		url  : "approve-changes.php",  //your page
            		data : { id : resumenId, apl : approvar },// passing the values
            		success: function(respuesta){
						//alert(respuesta);
						if(confirm(respuesta)) document.location = enlaceARequests;
						//else document.location = enlaceARequests;
                    }
        		});
				//window.location.replace(enlaceARequests)
			}
		</script>


		<?php 
	$consulta = "select * from `resumenes-cambios` where id='" . $_GET['id'] . "'";
	if ($resultado = $conn->query($consulta)->fetch_assoc()) : ?>
		<script type="text/javascript">

			var resumenId=<?php echo json_encode($_GET['id']); ?>;
			var ttitulo = <?php echo json_encode($resultado['titulo']); ?>;
			var tautor = <?php echo json_encode($resultado['autor']); ?>;
			var resuemnDado = <?php echo json_encode($resultado['resumen']); ?>;
			var enlaceAlArticulo = <?php echo json_encode($resultado['fuente']); ?>;
			//var timagen="https://www.cancer.org/content/dam/cancer-org/images/photographs/objetcs/medical/coronavirus-cdc-illustration.jpg/jcr:content/renditions/cq5dam.web.1280.1280.jpeg";
			//var tvideo="https://www.youtube.com/embed/rLOWYCpz3AU";
			var timagen = <?php echo json_encode($resultado['imagen']);  ?>;
			var tvideo = <?php echo json_encode($resultado['video']); ?>;
			var tfecha = <?php echo json_encode($resultado['fecha_creacion']); ?>;
			
			if(timagen != null) imagenes.push(timagen);
			if(tvideo != null) listaDeVideos.push(tvideo);
		</script>
	<?php
	endif; ?>

  	<body  onload="cargarDatos()">
  	<div class="row justify-content-center">
  		<div class="col-2" id="margenM">
  		</div>
  		<div class="col-4" id="margenM">
  			<button type="button" class="btn btn-success" id="centrado" onclick="aprobar(1)">APROBAR RESUMEN</button>
  		</div>
		  <div class="col-4" id="margenM">
  			<button type="button" class="btn btn-danger" id="centrado" onclick="aprobar(0)">RECHAZAR RESUMEN</button>
  		</div>
  		<div class="col-2" id="margenM">
			<button type="button" class="btn btn-danger" id="centrado" onclick="Regresar()">Regresar</button>
  		</div>

  		<figure>
		  	<blockquote class="blockquote" id="titulo">
		   		<p></p>
		  	</blockquote>
		  	<figcaption class="blockquote-footer"  id="autor">
		   	 	por: 
		  	</figcaption>
		  	<figcaption class="blockquote-footer"  id="fecha" >
		   	 	publicado: 
		  	</figcaption>
		</figure>
  		
  		
  		<div class="col-12">
  			<button type="button" class="btn btn-outline-dark" id="centrado" onclick="irAlArticulo()">VER ARTICULO COMPLETO</button>
  		</div>
  		<div class="col-12" id="margenM"></div>
  		<div class="col-2" ></div>
		<div class="col-8" >
			<div class="shadow p-3 mb-5 bg-body rounded" id="resumen"></div>
				<div>
				<div class="collapse" id="collapseExample">
					<div class="card card-body" id="sugerencias">
						<div class="mb-3">
						  <label for="exampleFormControlTextarea1" class="form-label" id="instruccionesresumen">Redacte aquí el resumen, cuando termine puede publicarlo pulsando el botón “publicar cambios”.</label>
						  <textarea class="form-control" id="exampleFormControlTextarea1" rows="4">
						  </textarea>
						</div>
						<div class="col-3">
							<<a  class="btn btn-primary" role="button"  id="botonGuardarResumen" onclick="guardarResumen()"  data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Guardar resumen  </a>
						</div>
					</div>
				</div>
			</div>
		</div>

  		<div class="col-2" >
			  <!--
			<button type="button" class="btn btn-dark" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" id="problemas">Editar Resumen</button>
-->
		</div>


  		
  		<div class="col-12" id="margenM"></div>
  		<div class="col-2" ></div>
  		<div class="col-8">
  			<div class="row"id="contenedorImagenes">

  			</div>
  		</div>
  		<div class="col-2" ></div>

  		<div class="col-12" id="margenM"></div>

  		<div class="col-2" ></div>
  		<div class="col-8" id="contenedorImagenes">
  			<div class="row"id="videos">

  			</div>
  		</div>
  		<div class="col-2" ></div>

  		<div class="col-12" id="margenM"></div>

  		<div class="col-12">
  			<button type="button" class="btn btn-outline-dark" id="centrado" onclick="irAlArticulo()">VER ARTICULO COMPLETO</button>
  		</div>

  		<div class="col-12" id="margenG"></div>
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </div>
    </body>
</html>