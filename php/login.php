<?php
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    header('Location: main.php');
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>WatchME Login</title>
    <meta name="description"
        content="WatchMe es un proyecto para llevar un seguimiento de las series y peliculas que ves en las diferentes plataformas de contenido">
    <meta name="keywords" content="netflix, series, peliculas, watchMe" />
    <meta name="author" content="Willy" />
    <meta name="copyright" content="Propietario del copyright" />
    <meta name="robots" content="index" />


    <!-- Internal Files -->
    <link rel="stylesheet" href="../styles/css/output.css">
    <link rel="shortcut icon" type="image/png" href="../../styles/img/logoWatchme.ico"/>

    <!-- SweetAlert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Referencia Diseno -->
    <!-- https://dribbble.com/shots/6286426-Email-Subscription-Webpage-Design/attachments/6286426-Email-Subscription-Webpage-Design?mode=media -->

    <!-- Paleta de colores -->
    <!-- https://colorhunt.co/palette/213161 -->

    <style>
        b {
            display: none;
        }

        #passwordDiv {
            margin-top: 30px;
        }
        label {
            font-size: 20px;
        }
    </style>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col" style=" margin-top: 5%; margin-bottom: 2%;">
                <img src="../styles/img/popcorn.jpg" alt="Imagen Login Palomitas" style="width: 47%" class="img-fluid" id="imgLogin">
            </div>

            <div class="col" style="margin-top: 15%;">
                <form action="" method="post" id="loginForm">
                    <div class="form-group" id="usernameDiv">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter username" name="usuario">
                        <span></span>
                    </div>
                    <div class="form-group" id="passwordDiv">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                            name="contra">
                        <span></span>
                    </div>

                    <button type="submit" style="margin-top: 3%; width: 50%;" class="btn btn-primary" name="submit" id="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

<?php
require_once("DB.php");
require_once('./jsphp.php');

session_start();

$conn = DB::getInstance()->getConn();
$username = $_POST['usuario'];
$password = $_POST['contra'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($username) || !empty($password)) {
        // $sql = "SELECT nombre, id FROM heroku_a22259b35601486.users WHERE name = '$username' AND password = '$password'";

        $sql = "SELECT nombre, id FROM watchme.users WHERE nombre = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Guardar datos de sesión
            while ($row = $result->fetch_assoc()) {
                $_SESSION['username'] = $row ['nombre'];
                $_SESSION['id'] =  $row ['id'];
            }
            header('Location: main.php');
        } else {
            sweetalert2();
        }
    } else {
        sweetalert2();
    }
}
?>

</body>

</html>