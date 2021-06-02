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
        $url = "http://" . $_SERVER['HTTP_HOST'] . substr($_SERVER['REQUEST_URI'], 0, -9);
	    header('Location: ' . $url);
	    exit();
    } else {
        $message = 'Correo o contraseña incorrecta.';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Iniciar sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <style type="text/css" media="screen">
        #Sesion{
            background-image: linear-gradient(to top, #ffffff, #eef0ff, #d3e4ff, #afdaff, #7fd2ff);
            padding-top:30px ;
            margin-bottom: 20px;
        }
        #textoCentrado{
            text-align: center;
        }
        #inputPassword{
            border-radius: 10px;
        }
        #exampleFormControlInput1{
            border-radius: 10px;
        }
        #separacionCH{
            margin-top: 5px;
            margin-bottom: 10px;

        }
        #separacionM{
            margin-top: 10px;
            margin-bottom: 15px;
        }
        #separacionG{
            margin-top: 25px;
            margin-bottom: 30px;
        }
        #problemas{
            font-size: 14px;
        }
        #sugerencias{
            font-size: 18px;
        }
        #boton{
            margin: auto;
            display: block;
        }
        #objetivo{
                cursor:pointer;
                font-size: 16px;
            }
    </style>
    
    <script type="text/javascript">
        var paginaObjetivos="acercaDe.html";

        function objetivos(){
            location.href=paginaObjetivos;
        }
        
    </script>
</head>
<body class="row justify-content-center">
    <div class="col-12" id="Sesion">
        <h1 class="display-6" id="textoCentrado">Inicio de sesión</h1>
    </div>
    <div class="col-12" id="separacionCH"></div>
    <div class="col-3"></div>
    <div class="col-6">
        <div class="shadow p-3 mb-5 bg-body rounded" id="fondoInicioSesion">
            <div class="row justify-content-center" >
                <div class="col-1"></div>
                <div class="col-10">
                    <form action="login.php" method="POST" class="row justify-content-center">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Usuario</label>
                        <div class="col-sm-9">
                         <input type="text" name='usuario' class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>

                        <div class="col-12" id="separacionM"></div>

                        <label for="inputPassword" class="col-sm-3 col-form-label">Contraseña</label>
                        <div class="col-sm-9">
                         <input name="pass" type="password" class="form-control" id="inputPassword">
                        </div>
                        <div class="col-12" id="separacionG">
                            <button type="submit" class="btn btn-outline-primary" id="boton">Iniciar sesión</button>
                        </div>


                        </div>
                        <div class="col-12">
                            <p>
                                <h1 class="display-6" id="objetivo" onclick="objetivos()">Nuestro objetivo</h1>
                              <a class="display-6" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" id="problemas">
                                ¿Problemas con el inicio de sesión?
                              </a>

                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <h1 class="display-6" id="sugerencias">contacte al administrador para solucionar su inicio de sesion</h1>
                                </div>
                            </div>
                        </div>
                    </form>
                <div class="col-1"></div>
            </div>
        </div>
    </div>
    <div class="col-3"></div>   
    <div class="col-12" style="height: 100%;"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>