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
  
  <p>CAMBIOS: </p>
  <div>
    <?php
    require 'php-partials/db-conn.php';
    $consulta = "select * from `resumenes-cambios`";
    if ($ejecutar = $conn->query($consulta)) :
      while ($fila = $ejecutar->fetch_assoc()) : ?>
		<div>
          <span><?= "Titulo: " . $fila['texto'] . " Data: " . $fila['original'] . " Usuario: " . $fila['nombre_usuario'] ." Fecha: ". $fila['fecha_creacion']?></span>
          <a href="update-changes.php?id=<?= $fila['id'] ?>&apl=1"><button type="button">Aplicar</button></a> <a href="update-changes.php?id=<?= $fila['id'] ?>&apl=0"><button type="button">Rechazar</button></a>
        </div>
    <?php
      endwhile;
    endif; ?>
  </div>
  
  <p>USUARIOS: </p>
  <div>
  
	<?php
    $consulta = "select * from usuarios where tipo='admin' and  nombre NOT LIKE '" . $_SESSION['nombre'] . "'";
    if ($ejecutar = $conn->query($consulta)) :
      while ($fila = $ejecutar->fetch_assoc()) : ?>
        <div>
          <span><?= $fila['nombre'] ?></span>
          <a href="update-users.php?id=<?= $fila['id_usuario'] ?>&del=1">Descender</a>
        </div>
    <?php
      endwhile;
    endif;
    $consulta = "select * from usuarios where tipo='usuario'";
    if ($ejecutar = $conn->query($consulta)) :
      while ($fila = $ejecutar->fetch_assoc()) : ?>
        <div>
          <span><?= $fila['nombre'] ?></span>
          <a href="update-users.php?id=<?= $fila['id_usuario'] ?>&del=0">Ascender</a>
        </div>
    <?php
      endwhile;
    endif; ?>

  </div>

</body>

</html>