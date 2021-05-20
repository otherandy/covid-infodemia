<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pruebas de Etiquetado</title>
</head>
<?php
require "php-partials/db-conn.php";
$id_resumen = "1";
?>

<body>
  <div>
    <a>Noticias Covid1 ejemplo</a>
    <?php
    $consulta = "select * from etiquetas_de_resumen a,etiquetas b where resumenes_id='" . $id_resumen . "' and etiquetas_id=b.id";
    if ($ejecutar = $conn->query($consulta)) :
      while ($fila = $ejecutar->fetch_assoc()) : ?>
        <span><?= $fila['nombre'] ?></span>
    <?php
      endwhile;
    endif; ?>
    <button>
      <span>Edit</span>
    </button>
  </div>
</body>

</html>