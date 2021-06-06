<?php
session_start();

if (isset($_SESSION['nombre']) and $_SESSION['tipo'] != "admin") {
	echo '<h5 style="text-align:right;">' . $_SESSION['nombre'] . ' <a href="logout.php">Cerrar Sesion</a> </h5>';
}
if (isset($_SESSION['nombre']) and $_SESSION['tipo'] == "admin") {
	echo '<h5 style="text-align:right;"><a href="requests.php">' . $_SESSION['nombre'] . '  </a>  <a href="logout.php">Cerrar Sesion</a> </h5>';
}
if (!isset($_SESSION['nombre'])) {
	echo '<h5 style="text-align:right;"><a href="login.php">Iniciar Sesion</a>   <a href="registro.php">Registrate</a> </h5>';
}
