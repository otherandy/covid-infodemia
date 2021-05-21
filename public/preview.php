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
  $consulta = "select * from resumenes where id='" . $_GET['id'] . "'";
  if ($resultado = $conn->query($consulta)->fetch_assoc()) : ?>
    <form action="update.php" method="POST">
      <input type="number" name="id" value="<?= $_GET['id'] ?>" hidden>
      <label for="texto">Texto:</label>
      <input type="text" id="texto" name="texto" value="<?= $resultado['texto'] ?>">
      <label for="original">Original:</label>
      <textarea id="original" name="original" rows="4" cols="50"><?= $resultado['original'] ?></textarea>
      <input type="submit" value="Submit">
    </form>
  <?php
  endif; ?>
</body>

</html>