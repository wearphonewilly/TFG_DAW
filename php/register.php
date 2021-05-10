<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>WatchME Register</title>
    <meta name="description"
        content="WatchMe es un proyecto para llevar un seguimiento de las series y peliculas que ves en las diferentes plataformas de contenido">
    <meta name="keywords" content="netflix, series, peliculas, watchMe" />
    <meta name="author" content="Willy" />
    <meta name="copyright" content="Propietario del copyright" />
    <meta name="robots" content="index" />


    <!-- Internal Files -->
    <link rel="stylesheet" href="../styles/css/output.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">


    <!-- Referencia Diseno -->
    <!-- https://dribbble.com/shots/6286426-Email-Subscription-Webpage-Design/attachments/6286426-Email-Subscription-Webpage-Design?mode=media -->

    <!-- Paleta de colores -->
    <!-- https://colorhunt.co/palette/213161 -->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col" style="margin-left: 15%;margin-top:5%;">

                <h1>REGISTRO</h1>

                <form action="register.php" method="post">

                    <div class="form-group">
                        <div class="col-lg-7">
                            <label for="exampleInputEmail1">Nombre</label>
                            <input type="text" class="form-control" autofocus="" placeholder="Introduzca el nombre"
                                autocomplete="off" name="nombre">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-7">
                            <label for="exampleInputEmail1">Mail</label>
                            <input type="email" class="form-control" autofocus="" inputmode="email"
                                placeholder="Introduzca el correo" autocomplete="off" name="correo">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-7">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" autofocus="" inputmode="password"
                                placeholder="Contraseña" autocomplete="off" name="contra">
                        </div>
                    </div> <br>
                    <div class="col-lg-7" style="margin-bottom: 5%;">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        <a href="./login.php" style="margin-left: 17%;">Ya estas registrado? Inicia sesión aquí </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php
    require_once("./DB.php");
    require_once('jsphp.php');
    $conn = DB::getInstance()->getConn();

    $name = $_POST['nombre'];
    $mail = $_POST['correo'];
    $password = $_POST['contra'];
    $passHash = password_hash($password, PASSWORD_BCRYPT);

    $name = $conn->real_escape_string($name);
    $mail = $conn->real_escape_string($mail);
    $passHash = $conn->real_escape_string($passHash);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($name) || !empty($mail) || !empty($passHash)) {
            // $result = $conn -> query("INSERT INTO heroku_a22259b35601486.users (name, mail, password) VALUES ('$name', '$mail', '$password')");
            $result = $conn -> query("INSERT INTO heroku_a22259b35601486.users (nombre, mail, password) VALUES ('$name', '$mail', '$passHash')");
            echo "<a href=\"login.php\"> IR AL LOGIN </a>";
        } else {
            sweetalert2();
        }
    }

    include('../html/scripts.html');

    ?>

    <!-- Notyf -->
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <!-- SweetAlert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>