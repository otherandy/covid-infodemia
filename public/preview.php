<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pruebas de Etiquetado</title>
</head>
<?php
require "php-partials/db-conn.php";
?>

<body>
  <?php
  session_start();
  $consulta = "select * from resumenes where id='" . $_GET['id'] . "'";
  if ($resultado = $conn->query($consulta)->fetch_assoc()) : ?>
    <form action="update.php" method="POST">
      <input type="number" name="id" value="<?= $_GET['id'] ?>" hidden>
      <label for="texto">Texto:</label>
      <input type="text" id="texto" name="texto" value="<?= $resultado['texto'] ?>">
      <input type="text" id="fecha" name="fecha" value="<?= $resultado['fecha_creacion'] ?>" hidden>
      <label for="original">Original:</label>
      <textarea id="original" name="original" rows="4" cols="50"><?= $resultado['original'] ?></textarea>
      <button type="submit">Actualizar</button>
    </form>
    <?php
  endif;
  $consulta = "select * from etiquetas_de_resumen,etiquetas e where resumenes_id='" . $_GET['id'] . "' and etiquetas_id=e.id";
  if ($ejecutar = $conn->query($consulta)) :
    while ($fila = $ejecutar->fetch_assoc()) : ?>
      <div>
        <span><?= $fila['nombre'] ?></span>
        <a href="update-tags.php?id=<?= $_GET['id'] ?>&e_id=<?= $fila['etiquetas_id'] ?>&r_id=<?= $fila['resumenes_id'] ?>&del=1">X</a>
      </div>
    <?php
    endwhile;
  endif;
  $consulta = "select * from etiquetas e where not exists (select * from etiquetas_de_resumen where resumenes_id='" . $_GET['id'] . "' and etiquetas_id=e.id)";
  if ($ejecutar = $conn->query($consulta)) :
    while ($fila = $ejecutar->fetch_assoc()) : ?>
      <div>
        <span><?= $fila['nombre'] ?></span>
        <a href="update-tags.php?id=<?= $_GET['id'] ?>&e_id=<?= $fila['id'] ?>&r_id=<?= $_GET['id'] ?>&del=0">+</a>
      </div>
  <?php
    endwhile;
  endif; ?>
</body>

</html>