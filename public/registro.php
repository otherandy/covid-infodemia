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
    if ($pass != $pass2) {
        $message = "<h4>Las contraseñas no coinciden</h4>";
    } else {

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