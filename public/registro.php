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
        $message = "<h4>Las contraseñas no coinciden</h4>";
    }
    else if($username_err == 1){
        $message = "<h4>El nombre de usuario ya esta tomado</h4>";
    }
    else if($email_err == 1){
        $message = "<h4>El correo ya esta tomado</h4>";
    }
    else {

        $pass = password_hash($_POST['contraseña'], PASSWORD_BCRYPT); //encriptamos la contraseña
        $sql = "INSERT INTO `usuarios`(`id_usuario`, `nombre`, `password`, `email`, `tipo`) VALUES (NULL,'" . $usuario . "','" . $pass . "','" . $correo . "','" . $tipo . "')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $message = "<h4>Usuario creado con exito</h4>";
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

    <title>Registro Alumno</title>
</head>



<body class="form-v10">
    <div class="page-content">
        <div class="form-v10-content">
            <?= $message ?>
            <form class="form-detail" action="registro.php" method="POST" id="myform">
                <input type="text" name="usuario" placeholder="nombre usuario">
                <input type="password" name="contraseña" placeholder="contraseña">
                <input type="password" name="contraseña2" placeholder=" confirme contraseña">
                <input type="text" title="debes usar un correo valido: ejemplo@ejemplo.com" name="correo" id="correo" class="input-text " required pattern="[^@]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Correo Electronico">

                <div class="container">
                    <input type="submit" onclick="alert(Registro Satisfactorio)" name="register" class="register" value="Registrar">
                </div>

            </form>
        </div>
    </div>
</body>

</html>
