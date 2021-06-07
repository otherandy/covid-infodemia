<?php
session_start();
if(!isset($_SESSION['nombre'])){
	echo 'Favor de iniciar sesion antes de realizar cambios';
}else if ($_SESSION['tipo'] == 'admin'){
	require "php-partials/db-conn.php";
    //$sql="INSERT INTO `resumenes` (`id`, `titulo`, `autor`, `resumen`, `fuente`, `imagen`, `video`, `fecha_creacion`) VALUES ('".$_POST['id']."', '".$_POST['titulo']."', '".$_POST['autor']."', '".$_POST['resumen']."', '".$_POST['fuente']."', '".$_POST['imagen']."', '".$_POST['video']."', '".$_POST['fecha']."')";
	$sql="update resumenes set titulo='".$_POST['titulo']."', autor='".$_POST['autor']."', resumen='".$_POST['resumen']."', fuente='".$_POST['fuente']."', imagen='".$_POST['imagen']."', video='".$_POST['video']."', fecha_creacion='".$_POST['fecha']."' where id='" . $_POST['id'] . "'";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo 'Datos actualizados, Admin.';

	}else{
		echo 'Error al guardar. Admin';
	}
}else{
	require "php-partials/db-conn.php";
    $sql="INSERT INTO `resumenes-cambios` (`id`, `nombre_usuario`, `id_resumen`, `titulo`, `autor`, `resumen`, `fuente`, `imagen`, `video`, `fecha_creacion`) VALUES (NULL, '".$_SESSION['nombre']."', '".$_POST['id']."', '".$_POST['titulo']."', '".$_POST['autor']."', '".$_POST['resumen']."', '".$_POST['fuente']."', '".$_POST['imagen']."', '".$_POST['video']."', '".$_POST['fecha']."')";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo 'Datos actualizados.';

	}else{
		echo 'Error al guardar.';
	}

}
