<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pruebas de Etiquetado</title>
</head>
<?php
$myId = $_GET['id'];
require "php-partials/db-conn.php";
?>

<body>
  <div>
    <?php
    $consulta = "select * from resumenes where id='" . $myId . "'";
    if ($ejecutar = $conn->query($consulta)) :
      while ($fila = $ejecutar->fetch_assoc()) : ?>
		<form action="">
			<label for="texto">Texto:</label><br>
			<input type="text" id="texto" name="texto" value="<?= $fila['texto'] ?>"><br>
			<label for="original">Original:</label><br>
			<textarea id="original" name="original" rows="4" cols="50"><?= $fila['original'] ?></textarea><br><br>
			<input type="submit" value="Submit">
		</form>
    <?php
      endwhile;
    endif; ?>
  </div>
</body>

</html>