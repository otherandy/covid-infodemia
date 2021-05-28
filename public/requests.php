<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar en repositorio</title>


</head>

<body>
  <h1>Solicitudes de actualizacion</h1>
  <?php
  require 'php-partials/session.php';
  if ($_SESSION['tipo'] != 'admin') {
    header("index.php");
  }
  ?>


  <div>

    <?php
    require 'php-partials/db-conn.php';
    $consulta = "select * resumenes";
    if ($ejecutar = $conn->query($consulta)) :
      while ($fila = $ejecutar->fetch_assoc()) : ?>
        <span><?= "CAMBIOS: titulo: " . $fila['texto'] . " data: " . $fila['original'] . " usuario: " . $fila['fecha_creacion'] . " <br>" ?></span>

    <?php
      /*endwhile;
        endif;*/
      endwhile;
    endif; ?>

  </div>

</body>

</html>