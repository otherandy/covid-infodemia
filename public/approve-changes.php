<?php
require "php-partials/db-conn.php";
if ((bool)$_POST['apl']) {
    $consulta = $conn->prepare("update resumenes r, `resumenes-cambios` rc set r.texto=rc.texto, r.original=rc.original, r.fecha_creacion=rc.fecha_creacion where r.id=rc.id_resumen and  rc.id='" . $_POST['id'] . "'");
	$consulta->execute();
}
$consulta = $conn->prepare("delete from `resumenes-cambios` where id='" . $_POST['id'] . "'");
$consulta->execute();
if ((bool)$_POST['apl']){
    echo 'Se Aprovo el cambio';
}
else{
    echo 'Se rechazo el cambio';
}

?>