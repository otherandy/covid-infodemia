<?php
require "php-partials/db-conn.php";
if ((bool)$_GET['del']) {
    $consulta = $conn->prepare("update usuarios set tipo='usuario' where id_usuario='" . $_GET['id'] . "'");
} else {
    $consulta = $conn->prepare("update usuarios set tipo='admin' where id_usuario='" . $_GET['id'] . "'");
}
$consulta->execute();

$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
while (substr($url, -1) != '/'):
    $url = substr($url, 0, -1);
endwhile;
header('Location: ' . $url. 'requests.php');
exit();
?>