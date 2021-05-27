<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar en repositorio</title>


</head>
<?php
require "php-partials/db-conn.php";
?>

<body>
  <h1>Buscador Covid Repositorio-tags</h1>
  <?php
  require 'php-partials/session.php';
  ?>


  <div style="text-align: right;"><?=$user?></div>
  <form action="index.php" method="GET">
    <input type="text" name="search" placeholder="search" value="<?= $_GET ? $_GET['search'] : "" ?>">
    <button type="submit">buscar</button>
  </form>

  <?php
  if ($_GET) : ?>
    <div>

      <?php
      $consulta = "select * from etiquetas_de_resumen,etiquetas e,resumenes r where e.nombre like '" . $_GET['search'] . "' and etiquetas_id=e.id and resumenes_id=r.id";
      if ($ejecutar = $conn->query($consulta)) :
        while ($fila = $ejecutar->fetch_assoc()) : ?>
          <a href="preview.php?id=<?= $fila['resumenes_id']; ?>"><?= $fila['texto'] ?> (<?= $fila['fecha_creacion'] ?>)</a>
          <?php
          $consulta2 = "select * from etiquetas_de_resumen,etiquetas e where resumenes_id='" . $fila['resumenes_id'] . "' and etiquetas_id=e.id";
          if ($ejecutar2 = $conn->query($consulta2)) :
            while ($fila2 = $ejecutar2->fetch_assoc()) : ?>
              <span><?= $fila2['nombre'] ?></span>
      <?php
            endwhile;
          endif;
        endwhile;
      endif; ?>

    </div>
  <?php
  endif; ?>
</body>

</html>