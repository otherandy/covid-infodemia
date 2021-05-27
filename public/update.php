<?php
session_start();
if(!isset($_SESSION['nombre'])){
	header('index.php');
}
require "php-partials/db-conn.php";
$sql="INSERT INTO `resumenes-cambios` (`id`, `id_resumen`, `texto`, `original`, `fecha_creacion`, `nombre_usuario`) VALUES (NULL, '".$_POST['id']."', '".$_POST['texto']."', '".$_POST['original']."', '".$_POST['fecha']."', '".$_SESSION['nombre']."')";
$query = mysqli_query($conn,$sql);
if($query){
	echo 'Datos actualizados. <a href="index.php">Inicio</a>';

}else{
    $message="Error al guardar: ".$sql;
}


/*$consulta = $conn->prepare("INSERT INTO `resumenes-cambios` (`id`, `id_resumen`, `texto`, `original`, `fecha_creacion`) VALUES (NULL, ?, ?, ?,?,?)");
$consulta->bind_param("ssi", $_POST['id'], $_POST['texto'], $_POST['original'], $_POST['fecha'], $_SESSION['nombre']);
$consulta->execute();

if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
    $uri = 'https://';
} else {
    $uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'];
header('Location: ' . $uri . '/preview.php?id=' . $_POST['id']);
exit;*/
?>
