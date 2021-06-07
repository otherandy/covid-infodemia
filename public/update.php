<?php
session_start();
if(!isset($_SESSION['nombre'])){
	echo 'Favor de iniciar sesion antes de realizar cambios';
}else{
	require "php-partials/db-conn.php";
    $sql="INSERT INTO `resumenes-cambios` (`id`, `id_resumen`, `texto`, `original`, `fecha_creacion`, `nombre_usuario`) VALUES (NULL, '".$_POST['id']."', '".$_POST['texto']."', '".$_POST['original']."', '".$_POST['fecha']."', '".$_SESSION['nombre']."')";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo 'Datos actualizados.';

	}else{
		echo 'Error al guardar.';
	}
}
