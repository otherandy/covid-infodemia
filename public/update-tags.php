<?php
require "php-partials/db-conn.php";
if ((bool)$_GET['del']) {
    $consulta = $conn->prepare("delete from etiquetas_de_resumen where etiquetas_id=? and resumenes_id=?");
} else {
    $consulta = $conn->prepare("insert into etiquetas_de_resumen(etiquetas_id, resumenes_id) values(?, ?)");
}
$consulta->bind_param("ii", $_GET['e_id'], $_GET['r_id']);
$consulta->execute();

if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
    $uri = 'https://';
} else {
    $uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'];
header('Location: ' . $uri . '/preview.php?id=' . $_GET['id']);
exit;
