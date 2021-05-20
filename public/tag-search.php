<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar en repositorio</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<?php
require "php-partials/db-conn.php";
?>

<body>
  <div class="container">
    <h1>Buscador Covid Repositorio-tags</h1>
    <form id="form" action="tag-search.php" method="POST">
      <div class="form-group">
        <input type="text" id="search" name="search" class="form-control" placeholder="search">
      </div>
      <button type="submit" class="button.btn.btn-danger btn-block">buscar</button>
      <div class="form-group">
      </div>
    </form>
  </div>
  <div class="container">
    <?php
    if ($_POST) :
      $consulta = "select * from etiquetas_de_resumen a,etiquetas b,resumenes c where b.nombre like '" . $_POST['search'] . "' and etiquetas_id=b.id";
      if ($ejecutar = $conn->query($consulta)) :
        while ($fila = $ejecutar->fetch_assoc()) :
    ?>
          <a href="#"><?= $fila['texto'] ?></a>
          <?php
          $consulta2 = "select * from etiquetas_de_resumen a,etiquetas b where resumenes_id='" . $fila['resumenes_id'] . "' and etiquetas_id=b.id";
          if ($ejecutar2 = $conn->query($consulta2)) :
            while ($fila2 = $ejecutar2->fetch_assoc()) : ?>
              <span class="badge badge-info"><?= $fila2['nombre'] ?></span>
          <?php
            endwhile;
          endif;
          ?>
          <style>
            .edit {
              background: none;
              border: none;
              margin: 0;
              padding: 0;
              cursor: pointer;
            }
          </style>
          <button class="edit">
            <span class="badge badge-success">Edit</span>
          </button>

    <?php
        endwhile;
      endif;
    endif;
    ?>
  </div>

</body>

</html>