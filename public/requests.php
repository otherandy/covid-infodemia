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
	  $url = "http://" . $_SERVER['HTTP_HOST'] . substr($_SERVER['REQUEST_URI'], 0, -12);
	  header('Location: ' . $url);
	  exit();
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
	
	<?php
    $consulta = "select * from usuarios where tipo='admin' and  nombre NOT LIKE '" . $_SESSION['nombre'] . "'";
    if ($ejecutar = $conn->query($consulta)) :
      while ($fila = $ejecutar->fetch_assoc()) : ?>
        <div>
          <span><?= $fila['nombre'] ?></span>
          <a href="update-users.php?id=<?= $fila['id_usuario'] ?>&del=1">Demote</a>
        </div>
    <?php
      endwhile;
    endif;
    $consulta = "select * from usuarios where tipo='usuario'";
    if ($ejecutar = $conn->query($consulta)) :
      while ($fila = $ejecutar->fetch_assoc()) : ?>
        <div>
          <span><?= $fila['nombre'] ?></span>
          <a href="update-users.php?id=<?= $fila['id_usuario'] ?>&del=0">Promote</a>
        </div>
    <?php
      endwhile;
    endif; ?>

  </div>

</body>

</html>