<?php
session_start();

if(isset($_SESSION['nombre'])){
echo '<h5>'.$_SESSION['nombre'].' <a href="logout.php">Cerrar Sesion</a>.</h5>';
}else{
	echo'<h5><a href="login.php">Iniciar Sesion</a>   <a href="registro.php">Registrate</a></h5>';
}
?>