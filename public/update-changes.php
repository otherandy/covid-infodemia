<?php
require "php-partials/db-conn.php";
if ((bool)$_GET['apl']) {
    $consulta = $conn->prepare("update resumenes r, `resumenes-cambios` rc set r.texto=rc.texto, r.original=rc.original, r.fecha_creacion=rc.fecha_creacion where r.id=rc.id_resumen and  rc.id='" . $_GET['id'] . "'");
	$consulta->execute();
}
$consulta = $conn->prepare("delete from `resumenes-cambios` where id='" . $_GET['id'] . "'");
$consulta->execute();

$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
while (substr($url, -1) != '/'):
    $url = substr($url, 0, -1);
endwhile;
header('Location: ' . $url. 'requests.php');
exit();
?>