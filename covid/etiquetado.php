<!DOCTYPE html>
<html lang="es">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<?php
require "php-partials/db-conn.php";
$id_resumen="1";
?>

<div class="container">
<a href="#">Noticias Covid1 ejemplo</a>
<?php
$consulta="select * from etiquetas_de_resumen a,etiquetas b where resumenes_id='".$id_resumen."' and etiquetas_id=b.id";
if($ejecutar=$conn->query($consulta)):
while($fila=$ejecutar->fetch_assoc()): 
?>
<span class="badge badge-info"><?=$fila['nombre']?></span>
<?php
endwhile;
endif;
?>
<style>
.edit {
    background:none;
    border:none;
    margin:0;
    padding:0;
    cursor: pointer;
}
</style>
<button class="edit"><span class="badge badge-success">
              Edit
            </span></button>

</div>

<div class="modal fade" id='modal-edit' tabindex="1"
        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Etiquetado
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
              <form action="solicitar.php" method="POST">
                <input id="prodId" name="id_empleo" type="hidden" value=<?=$fila['id_empleo']?> >
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </form>
            </div>
          </div>
        </div>
      </div>
