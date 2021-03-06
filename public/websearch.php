<!DOCTYPE html>
<html lang="es">
<?php require "php-partials/db-conn.php"; ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <style type="text/css">
    #zonaImagen {
      margin-top: 50px;
      margin-bottom: 30px;
      height: 200px;

    }

    .padding10 {
      padding: 12px;
      border-radius: 25px;
      text-align: center;
    }

    .padding11 {
      padding: 5px;
      border-radius: 117px;
      text-align: center;
    }

    .margen15 {
      margin: 15px;
    }

    img {
      margin-left: 70px;
    }
  </style>
  <title>Buscador</title>
</head>

<body>
  <div class="container" align="right">
    <?php require "php-partials/session.php"; ?>
  </div>
  

  <?php
  if (!$_GET) : ?>

    <div class="container">
      <div id="zonaImagen" class="row">
        <div class="col-4">
        </div>
        <div class="col-4">
          <img src="https://webimages.iadb.org/Drupal_pantheon/2020-08/1-%281%29.png?VersionId=XywK8tvqUHQXXCyaEBVKRe13Alhvq4Bl" height="150" width="150">
          <h6>Juntos para evitar la desinformación</h6>
        </div>
      </div>
      <div class="col-4">
      </div>
    </div>

    <form action="websearch.php" method="GET">
      <div class="row gy-5">
        <div class="col-2"></div>
        <div class="col-7">
          <div class="input-group mb-3">
            <input type="text" name="search" class="form-control padding10" placeholder="Introduce la busqueda">
          </div>
        </div>
        <div class="col-3">
          <button type="submit" class="btn btn-primary me-md-2 padding10">BUSCAR</button>
        </div>
      </div>
    </form>
    </div>

  <?php
  else : ?>
    <div class="container">
      <div class="margen15"></div>
      <form action="websearch.php" method="GET">
        <div class="row gy-5">
          <div class="col-2"></div>
          <div class="col-6">
            <div class="input-group mb-3">
              <input type="text" name="search" class="form-control padding11" placeholder="Introduce la busqueda" value="<?= $_GET ? $_GET['search'] : "" ?>">
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary me-md-2 padding11">BUSCAR</button>
          </div>
        </div>
      </form>
    </div>

    <div class="container">
      <div class="margen15"></div>
      <div class="row gy-5">
        <div class="col-1"></div>

        <div id="resutados" class="col-10">
          <div class="pahe-header">
            <h6 id="Titulo" style="text-align: center;"></h6>
          </div>
          <?php
             $curl= curl_init(); //inicializamos el curl
             $s=$_GET['search'];
             $s=str_replace(" ",'+',$s);
             $site="https://coronavirus.gob.mx/";
             $search_string="https://www.google.com/search?q=site:".$site."+".$s;
             curl_setopt($curl,CURLOPT_URL,$search_string);
             curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
             curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
             $result= curl_exec($curl);
             //echo $result;
             preg_match_all('!https://coronavirus.gob.mx/[^\s]*?">!', $result, $links);
             $links=$links[0];

             for($i=0;$i<sizeof($links);$i++){
              $links[$i]=str_replace('">', "", $links[$i]);
              //$links[$i]=str_replace("sa=U", "POPO", $links[$i]);
              $links[$i]=strstr($links[$i],'&',true);
             }
             $links=array_unique($links);

             print_r($links);

             curl_close($curl);

          ?>
          
        </div>

        <div id="mostrarResultados" class="col-1"></div>
      </div>
    </div>
  <?php
  endif; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
