<?php
session_start();
$message = "";
require 'php-partials/db-conn.php';

/*if (isset($_SESSION['tipo'])) {
    header('Location: index.php');
}*/
if ($_POST) {
    $usuario = $_POST['usuario'];
    $pass = $_POST['contraseña'];
    $pass2 = $_POST['contraseña2'];
    $correo = $_POST['correo'];
    $tipo = "usuario";
    $username_err = 0; //variable flag, si es 1 el usuario ya esta tomado
    $email_err = 0;
	
    //checar nombres repetidos
    $sql_nombre = "SELECT `id_usuario` FROM `usuarios` WHERE `nombre` = ?";
    if($stmt = mysqli_prepare($conn, $sql_nombre)){
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = trim($usuario);
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
                
            if(mysqli_stmt_num_rows($stmt) == 1){ //si ya hay un registro con ese nombre de usuario
                $username_err = 1; //variable flag
            }
        }
        mysqli_stmt_close($stmt);
    }
    //checar correos repetidos
    $sql_email = "SELECT `id_usuario` FROM `usuarios` WHERE `email` = ?";
    if($stmt = mysqli_prepare($conn, $sql_email)){
        mysqli_stmt_bind_param($stmt, "s", $param_email);
        $param_email = trim($correo);
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
                
            if(mysqli_stmt_num_rows($stmt) == 1){
                $email_err = 1; //variable flag
            }
        }
        mysqli_stmt_close($stmt);
    }
	
    if ($pass != $pass2) {
		echo '<script language="javascript">';
		echo 'alert("Las contraseñas no coinciden")';
		echo '</script>';
    }
    else if($username_err == 1){
		echo '<script language="javascript">';
		echo 'alert("El nombre de usuario ya esta tomado")';
		echo '</script>';
    }
    else if($email_err == 1){
		echo '<script language="javascript">';
		echo 'alert("El correo ya esta tomado")';
		echo '</script>';
    }
    else {

        $pass = password_hash($_POST['contraseña'], PASSWORD_BCRYPT); //encriptamos la contraseña
        $sql = "INSERT INTO `usuarios`(`id_usuario`, `nombre`, `password`, `email`, `tipo`) VALUES (NULL,'" . $usuario . "','" . $pass . "','" . $correo . "','" . $tipo . "')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
			echo '<script language="javascript">';
			echo 'alert("Usuario creado con exito")';
			echo '</script>';
            $_SESSION['usuario'] = $usuario;
            $_SESSION['tipo'] = $tipo;
        } else {
            $message = "Error al guardar: " . $sql;
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Agregar usuario</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

	<style type="text/css" media="screen">
		#Sesion{
			background-image: linear-gradient(to top, #ffffff, #eef0ff, #d3e4ff, #afdaff, #7fd2ff);
			padding-top:30px ;
			margin-bottom: 20px;
			height: 200px;
		}
		#textoCentrado{
			text-align: center;
		}
		#campo{
			padding-left: 15%;
			padding-right: 15%;
			padding-top: 2%;
			padding-bottom: 2%;
		}

	</style>

	<script type="text/javascript">
		function validateForm() {
			var x = document.forms["myForm"]["usuario"].value;
			if (x == "") {
				alert("El campo de usuario debe ser llenado");
				return false;
			}
			var y = document.forms["myForm"]["contraseña"].value;
			if (y == "") {
				alert("El campo de contraseña debe ser llenado");
				return false;
			}
			var z = document.forms["myForm"]["correo"].value;
			if (z == "") {
				alert("El campo de correo debe ser llenado");
				return false;
			}
		}
		function regresar() {
			var url = window.location.href;
			url = url.substring(0, url.length - 12);
			location.href=url;
		}
	</script>
</head>
<body>
	<div class="row justify-content-center">
		<div class="col-12" id="Sesion">
		<h1 class="display-6" id="textoCentrado">Crear nuevo usuario administrativo</h1>
	</div>
	<div class="col-12" id="separacionCH"></div>
	<div class="col-3"></div>
	<div class="col-6">
	</div>
	<div class="col-3"></div>

	<div class="col-2"></div>
	<div class="col-8">
		<div class="shadow-lg p-3 mb-5 bg-white rounded">
			<div class="row">
				<form name="myForm" class="form-detail" action="registro.php" onsubmit="return validateForm()" method="POST" id="myform">
					<div class="col-12" id="campo">
						<div class="form-group">
						    <label for="usuario">Nombre de Usuario </label>
						    <input type="text" class="form-control" name="usuario" id="usuario">
						</div>
					</div>
					<div class="col-12" id="campo">
						<div class="form-group">
							<label for="contraseña">Contaseña</label>
							<input type="password" class="form-control" id="contraseña" name="contraseña">
						</div>
					</div>
					<div class="col-12" id="campo">
						<div class="form-group">
							<label for="contraseña2">Escriba nuevamente la contraseña</label>
							<input type="password" class="form-control" id="contraseña2" name="contraseña2">
						</div>
					</div>
					<div class="col-12" id="campo">
						<div class="form-group">
						    <label for="correo">Correo electrónico </label>
						    <input type="email" class="form-control" name="correo" id="correo" aria-describedby="emailHelp">
						    <small id="emailHelp" class="form-text text-muted">Ejemplo: ejemplo@uabc.edu.mx</small>
						</div>
					</div>
				
					<div class="col-12" id="campo">
						<button type="submit" class="btn btn-outline-primary" id="boton" name="register">Crear usuario </button>
					</div>
				</form>
				<div class="col-12" id="campo">
					<button type="button" class="btn btn-outline-secondary" onclick="regresar()">Regresar </button>
				</div>
				
			</div>
		</div>
	</div>
	<div class="col-2"></div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>