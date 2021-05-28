<?php
session_start();
static $message = "";
if (isset($_SESSION['nombre'])) {
    header('Location: index.php');
}

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'covid';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
    die('Conexion fallida: ' . $e->getMessage());
}

if (!empty($_POST['usuario']) && !empty($_POST['pass'])) {
    $records = $conn->prepare('SELECT nombre, password, tipo FROM usuarios WHERE nombre = :nombre');
    $records->bindParam(':nombre', $_POST['usuario']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = 'funciona';

    if (!empty($_POST['usuario']) && password_verify($_POST['pass'], $results['password'])) {
        $_SESSION['nombre'] = $results['nombre'];
        $_SESSION['tipo'] = $results['tipo'];
        $message = 'SESION INICIADA.';
    } else {
        $message = 'Correo o contraseña incorrecta.';
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Registro Alumno</title>
</head>


<h5><a href="index.php">inicio</a></h5>

<body class="form-v10">
    <div class="page-content">
        <div class="form-v10-content">
            <?= $message ?>
            <form class="form-detail" action="login.php" method="POST" id="myform">
                <input type="text" name="usuario" placeholder="nombre usuario">
                <input type="password" name="pass" placeholder="contraseña">

                <div class="container">
                    <input type="submit" onclick="alert(Registro Satisfactorio)" name="register" class="register" value="login">
                </div>

            </form>
        </div>
    </div>
</body>

</html>