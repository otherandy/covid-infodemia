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
  <form action="tag-search.php" method="POST">
    <input type="text" name="search" placeholder="search">
    <button type="submit">buscar</button>
  </form>
  <?php
  if ($_POST) : ?>
    <div>
      <?php
      $consulta = "select * from etiquetas_de_resumen a,etiquetas b,resumenes c where b.nombre like '" . $_POST['search'] . "' and etiquetas_id=b.id";
      if ($ejecutar = $conn->query($consulta)) :
        while ($fila = $ejecutar->fetch_assoc()) : ?>
          <a><?= $fila['texto'] ?></a>
          <?php
          $consulta2 = "select * from etiquetas_de_resumen a,etiquetas b where resumenes_id='" . $fila['resumenes_id'] . "' and etiquetas_id=b.id";
          if ($ejecutar2 = $conn->query($consulta2)) :
            while ($fila2 = $ejecutar2->fetch_assoc()) : ?>
              <span><?= $fila2['nombre'] ?></span>
          <?php
            endwhile;
          endif; ?>
          <button>
            <span>Edit</span>
          </button>
      <?php
        endwhile;
      endif; ?>
    </div>
  <?php
  endif; ?>
</body>

</html>