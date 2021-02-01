<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>WatchME</title>
    <meta name="description" content="Proyecto final de DAW">

    <!-- Internal Files -->
    <link rel="stylesheet" href="../styles/css/output.css">

    <!-- SweetAlert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <scrip src="sweetalert2.all.min.js">
        </script>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">


        <scrip src="../js/index.js" defer></scrip>

        <!-- Referencia Diseno -->
        <!-- https://dribbble.com/shots/6286426-Email-Subscription-Webpage-Design/attachments/6286426-Email-Subscription-Webpage-Design?mode=media -->

        <!-- Paleta de colores -->
        <!-- https://colorhunt.co/palette/213161 -->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col" style="margin-top: 5%;margin-left: 15%;">
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
                    <div class="col-lg-7">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col" id="imgRegistro">
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
            notyf(); //TODO Hay que mirar si funciona el alert este
        } else {
            sweetalert2();
        }
    }
    ?>


    <alert src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </alert>

    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

</body>

</html>