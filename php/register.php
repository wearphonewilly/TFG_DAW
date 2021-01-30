<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>WatchME</title>
    <meta name="description" content="Proyecto final de DAW">

    <!-- Internal Files -->
    <link rel="stylesheet" href="index.css">

    <!-- SweetAlert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <scrip src="sweetalert2.all.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


    <scrip src="../js/index.js" defer></scrip>

    <!-- Referencia Diseno -->
    <!-- https://dribbble.com/shots/6286426-Email-Subscription-Webpage-Design/attachments/6286426-Email-Subscription-Webpage-Design?mode=media -->

    <!-- Paleta de colores -->
    <!-- https://colorhunt.co/palette/213161 -->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="register.php" method="post">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" class="form-control" id="nombreForm" aria-describedby="emailHelp"
                            autofocus="" placeholder="Introduzca el nombre" autocomplete="off" name="nombre">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Mail</label>
                        <input type="email" class="form-control" id="mailForm" aria-describedby="emailHelp" autofocus=""
                            inputmode="email" placeholder="Introduzca el correo" autocomplete="off" name="correo">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="passwordForm" autofocus="" inputmode="password"
                            placeholder="Contraseña" autocomplete="off" name="contra">
                    </div> <br>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
            <div class="col">
                <img src="../styles/img/popcorn.jpg" alt="Imagen Login Palomitas" height="200px" width="200px"
                    class="img-fluid" id="imgReg">
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

    $name = $conn->real_escape_string($name);
    $mail = $conn->real_escape_string($mail);
    $password = $conn->real_escape_string($password);

    // TODO: Encriptar contraseña
    // $passwordCrypted = password_hash($password, PASSWORD_BCRYPT, ['salt' => 'abc']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($name) && !empty($mail) && !empty($password)) {
            $result = $conn -> query("INSERT INTO heroku_a22259b35601486.users (name, mail, password) VALUES ('$name', '$mail', '$password')");
            echo "Ir al login";
        } else {
            sweetalert2();
        }
    }
    ?>


    <alert src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </alert>

</body>

</html>