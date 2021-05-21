<?php
require "php-partials/db-conn.php";
$consulta = $conn->prepare("update resumenes set texto=?, original=? where id=?");
$consulta->bind_param("ssi", $_POST['texto'], $_POST['original'], $_POST['id']);
$consulta->execute();

if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
    $uri = 'https://';
} else {
    $uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'];
header('Location: ' . $uri . '/preview.php?id=' . $_POST['id']);
exit;
