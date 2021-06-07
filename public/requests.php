<!DOCTYPE html>
<?php
  require 'php-partials/session.php';
  if ($_SESSION['tipo'] != 'admin') {
	  $url = "http://" . $_SERVER['HTTP_HOST'] . substr($_SERVER['REQUEST_URI'], 0, -12);
	  header('Location: ' . $url);
	  exit();
  }
  ?>
<html>
<head>
  <meta charset="utf-8">
  <title>Revision de articulos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <style type="text/css" media="screen">
    body{
      background-image: linear-gradient(to top, #ffffff, #eef0ff, #d3e4ff, #afdaff, #7fd2ff);
      padding-top: 20px;
      padding-bottom: 10px;
    }
    #titulo1{
      text-align: center;
    }
    #buscador{
      margin: 10px;
      text-align: center;
      border-radius: 10px;
    }
    #margenM{
      margin-top: 30px;
     
    }
    #margenG{
      margin-top: 70px;
    }
    #enlaceANuestroObjetivo{
      font-size: 16px;
      font-weight: 400;
      text-align: center;
      padding:10px ;
      cursor:pointer;
    }
    #nombreUsuario{
      font-size: 16px;
      font-weight: 400;
      text-align: center;
      padding:10px ;
      color: rgb(0, 96, 161);
      cursor:pointer;
    }
    #textoChico{
      font-size: 16px;
      font-weight: 400;
      text-align: center;
      
    }
    #centrado{
      display:block;
      margin-left: auto;
      margin-right: auto;
    }
    #bordesRedondeados{
      border-radius: 10px;
      margin-left: 15px;
      margin-top: 15px;
    }
    #botonCierreSesion{
      display:block;
      margin-left: auto;
      margin-right: auto;
      border-radius: 5px;
      color: rgb(0, 76, 161 );
    }
    #botonCrearUsuario{
      display:block;
      margin-left: auto;
      margin-right: auto;
      border-radius: 5px;
      color: rgb(0, 76, 161 );
    }
    #titulo1{
      font-size: 35px;
      font-weight: 400;
      text-align: center;
      margin-top: 20px;
    }
    #zonaDeResumenesRevision{
      height: 400px;
    }
    #zonaDeRevisados{
      height: 400px;
    }
    #margenXG{
      height: 80px;
    }
    #tituloResumen{
      font-size: 20px;
      font-weight: 600;
      text-align: left;
      padding-right: 5px;
      cursor:pointer;
      padding-left: 10px;
    }
    #autorResumen{
      font-size: 18px;
      font-weight: 400;
      text-align: left;
      padding-right: 5px;
    }
    #fechaResumen{
      font-size: 18px;
      font-weight: 300;
      text-align: left;
      padding-right: 5px;
    }
    #resultado{
      margin-bottom: 40px;
    }
  </style>

  <script type="text/javascript">
    class Revision{
        Revision(titulo,fecha,autor,enlaceAlResumen,estado){
          this.titulo=titulo;
          this.fecha=fecha;
          this.autor=resumen;
          this.enlaceAlResumen=enlaceAlResumen;
          this.estado=estado;
        }
    }

    var resultados=[];
    var listarResumenesRevision=[];
    var listaDeRevisados=[];

    /*
    for (var i = 0; i < 25; i++) {
      var rev=new Revision();

      if(i%3==0){
        rev.titulo="Miocarditis fulminante por COVID-19";
        rev.fecha="Junio 2020";
        rev.autor="Ángela Irabien-Ortiz";
        rev.enlaceAlResumen="edicionDeResumen.html";
        listarResumenesRevision.push(rev);
        listaDeRevisados.push(rev);
      }
      else if(i%2==0){
        rev.titulo="COVID-19";
        rev.fecha="Mayo 2010";
        rev.autor="Juana Lagos Cruz";
        rev.enlaceAlResumen="edicionDeResumen.html";
        listarResumenesRevision.push(rev);
        listaDeRevisados.push(rev);
      }
      else {
        rev.titulo="titulo prueba numero 3";
        rev.fecha="agosto 1800";
        rev.autor="alumnos de ingenieria de software";
        rev.enlaceAlResumen="edicionDeResumen.html";
        listarResumenesRevision.push(rev);
        listaDeRevisados.push(rev);

      }
      
    }*/

    var nombreUsuario="GradonFonseca@uabc.edu.mx";
    var NuestroObjetivo="acercaDe.html";
    
    function llenadoDeInformacion(){
      document.getElementById('nombreUsuario').innerHTML+=nombreUsuario;
      document.getElementById('enlaceANuestroObjetivo').innerHTML+="NUESTRO OBJETIVO";
    }


    function listarRevisiones(){
      for (var i = 0; i < listarResumenesRevision.length; i++) {
        var resultados=document.getElementById("zonaDeResumenesRevision");
        resultados.innerHTML+=`
          <div class="shadow-sm p-3 mb-5 bg-white rounded" id="resultado">  
           <div class="row" >
              <div class="col-6">
                <p class="display-6"id="tituloResumen" onclick="location.href='${listarResumenesRevision[i].enlaceAlResumen}'" >
                  ${listarResumenesRevision[i].titulo}
                </p>
              </div>
              <div class="col-3">
                <p class="display-6" id="autorResumen" >
                  ${listarResumenesRevision[i].autor}
                </p>
              </div>
              <div class="col-3">
                <p class="display-6" id="fechaResumen" >
                  ${listarResumenesRevision[i].fecha}
                </p> 
              </div>
            </div>
          </div>
        `;
      }
    }
    
     function listarRevisados(){
      for (var i = 0; i < listaDeRevisados.length; i++) {
        var resultados=document.getElementById("zonaDeRevisados");
        resultados.innerHTML+=`
          <div class="shadow-sm p-3 mb-5 bg-white rounded" id="resultado">  
           <div class="row" >
              <div class="col-6">
                <p class="display-6"id="tituloResumen" onclick="location.href='${listaDeRevisados[i].enlaceAlResumen}'">
                  ${listaDeRevisados[i].titulo}
                </p>
              </div>
              <div class="col-3">
                <p class="display-6" id="autorResumen">
                  ${listaDeRevisados[i].autor}
                </p>
              </div>
              <div class="col-3">
                <p class="display-6" id="fechaResumen">
                  ${listaDeRevisados[i].fecha}
                </p> 
              </div>
            </div>
          </div>
        `;
      }
    }

    function listarRevisiones(){
      for (var i = 0; i < listarResumenesRevision.length; i++) {
        var resultados=document.getElementById("zonaDeResumenesRevision");
        resultados.innerHTML+=`
          <div class="shadow-sm p-3 mb-5 bg-white rounded" id="resultadob">  
           <div class="row" >
              <div class="col-6">
                <p class="display-6"id="tituloResumen" onclick="location.href='${listarResumenesRevision[i].enlaceAlResumen}'" style="color: rgb(2, 32, 66);">
                  ${listarResumenesRevision[i].titulo}
                </p>
              </div>
              <div class="col-3">
                <p class="display-6" id="autorResumen" style="color: rgb(2, 32, 66);">
                  ${listarResumenesRevision[i].autor}
                </p>
              </div>
              <div class="col-3">
                <p class="display-6" id="fechaResumen" style="color: rgb(2, 32, 66);">
                  ${listarResumenesRevision[i].fecha}
                </p> 
              </div>
            </div>
          </div>
        `;
      }
    }
    
     function listarbusquedas(listaDeRevisados){
      for (var i = 0; i < listaDeRevisados.length; i++) {
        var resultados=document.getElementById("zonaDeRevisados");
        resultados.innerHTML+=`
          <div class="shadow-sm p-3 mb-5 bg-white rounded" id="resultadob">  
           <div class="row" >
              <div class="col-6">
                <p class="display-6"id="tituloResumen" onclick="location.href='${listaDeRevisados[i].enlaceAlResumen}'">
                  ${listaDeRevisados[i].titulo}
                </p>
              </div>
              <div class="col-3">
                <p class="display-6" id="autorResumen">
                  ${listaDeRevisados[i].autor}
                </p>
              </div>
              <div class="col-3">
                <p class="display-6" id="fechaResumen">
                  ${listaDeRevisados[i].fecha}
                </p> 
              </div>
            </div>
          </div>
        `;
      }
    }

    function enlaceANuestroObjetivo(){
      location.href=NuestroObjetivo;
    }

    function cargarInformacion(){
       llenadoDeInformacion();
       listarRevisiones();
       listarRevisados();
    }

    function alfanumerico(letra){

      var letras="abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ-*,/01234567891@ ";
      
        if(letras.indexOf(letra)!=-1) return true;
        else return false;
      
    }

    function capturarPalabra(entrada,palabra){
        if(entrada=="Backspace" && palabra.length>0 ){
          palabra=palabra.substring(0, palabra.length - 1);
        }
        else if(alfanumerico(entrada.toLowerCase())) {
                palabra+=event.key;
        }
        console.log(palabra.toLowerCase());
        return palabra.toLowerCase();
    }

    function limpiezaDeArea(){
      var limpiar=document.getElementById("zonaDeRevisados");
      while (limpiar.firstChild) {
        limpiar.removeChild(limpiar.firstChild);
      }
    }

    function limpiarListaDeResultados(){
      while (resultados.length>0) {
          resultados.pop();
      }
    }

    function cargarResultados(lista,palabra){
      var resu=[];
      for (var i = 0; i < lista.length; i++) {
            var t=lista[i].titulo.toLowerCase();
            var a=lista[i].autor.toLowerCase();
            var f=lista[i].fecha.toLowerCase();
            
          if(t.indexOf(palabra)>-1||a.indexOf(palabra)>-1||f.indexOf(palabra)>-1){
           resu.push(lista[i]);
          }
      }
      return resu;
    }

    var palabraBuscar="";

    function buscar(event){
      console.log(event);
      palabraBuscar=capturarPalabra(event.key,palabraBuscar);
      limpiezaDeArea();

      limpiarListaDeResultados();

      if(palabraBuscar==""){
        listarRevisados();
      }
      else{
        resultados=cargarResultados(listaDeRevisados,palabraBuscar);
        if(resultados.length>0){
          listarbusquedas(resultados);
        }
      }
    }
  
    function crearUsuario(){
      location.href="crearUsuario.html";
    }

  </script>


      <?php
    require 'php-partials/db-conn.php';
    $consulta = "select * from `resumenes-cambios`";
    if ($ejecutar = $conn->query($consulta)) :
      while ($fila = $ejecutar->fetch_assoc()) : ?>
        <script type="text/javascript">

          var rev=new Revision();
          rev.titulo = <?php echo json_encode($fila['titulo']); ?>;
          rev.autor=<?php echo json_encode($fila['autor']); ?>;
          rev.enlaceAlResumen='preview-changes.php?id=' + <?php echo json_encode($fila['id']); ?>;
          rev.fecha = <?php echo json_encode($fila['fecha_creacion']); ?>;
          
          listarResumenesRevision.push(rev);
			
			if(timagen != null) imagenes.push(timagen);
			if(tvideo != null) listaDeVideos.push(tvideo);

			  </script>
    <?php
      endwhile;
    endif; ?>

<?php
    $consulta = "select * from `resumenes`";
    if ($ejecutar = $conn->query($consulta)) :
      while ($fila = $ejecutar->fetch_assoc()) : ?>
        <script type="text/javascript">
          var rev=new Revision();
          rev.titulo = <?php echo json_encode($fila['titulo']); ?>;
          rev.autor=<?php echo json_encode($fila['autor']); ?>;
          rev.fecha = <?php echo json_encode($fila['fecha_creacion']); ?>;
          rev.enlaceAlResumen='preview.php?id=' + <?php echo json_encode($fila['id']); ?> + '&q=';
          listaDeRevisados.push(rev);

			  </script>
    <?php
      endwhile;
    endif; ?>

</head>
<body onload="cargarInformacion()">
  <div class="row justify-content-center">
    <div class="col-3" id="margenCH">
      <a class="display-6" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" id="nombreUsuario"></a>
      <div class="collapse" id="collapseExample">
        <div class="card card-body" id="bordesRedondeados">
          <div class="row">
            <div class="col-6">
              <button type="button" class="btn btn-outline-primary" id="botonCierreSesion">Cerrar sesion</button>
            </div>
            <div class="col-6">
              <button type="button" class="btn btn-outline-primary" id="botonCrearUsuario" onclick="crearUsuario()">Crear usuario</button>
            </div>
          </div>
        </div>
      </div> 
    </div>

    <div class="col-6" id="margenCH"></div>
    <div class="col-3" id="margenCH">
      <h1 class="display-6" id="enlaceANuestroObjetivo" onclick="enlaceANuestroObjetivo()"></h1>
    </div>


    <div class="col-12" id="margenG">
      <h1 class="display-6" id="titulo1" >Resúmenes para revisión </h1>
    </div>

    <div class="col-2"></div>
    <div class="col-8">
      <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <div class="overflow-auto" id="zonaDeResumenesRevision" >
          
          

        </div>
      </div>
    </div>
    <div class="col-2"></div>


    <div class="col-12" id="margenXG"></div>


    <div class="col-12" id="margenG">
      <h1 class="display-6" id="titulo1" >Resúmenes aprobados </h1>
    </div>

    <div class="col-5"></div>
    <div class="col-2" >
      <input class="form-control form-control-sm" type="text" placeholder="Buscar" id="buscador" onkeyup="buscar(event)"> 
    </div>
    <div class="col-5"></div>
    
    <div class="col-2"></div>
    <div class="col-8" >
      <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <div class="overflow-auto" id="zonaDeRevisados">
        </div>
      </div>
    </div>
    <div class="col-2"></div>
     

  </div>
  

  <div class="col-12" id="margenM"></div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>