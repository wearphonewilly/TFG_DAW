<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet" />
    <link href="../styles/css/output.css" rel="stylesheet" />
    <title>Register</title>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>

    <!-- Internal Files -->
    <link href="../styles/css/output.css" rel="stylesheet" />

    <!-- SweetAlert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


    <script src="../js/index.js" defer></script>

</head>

<body>
    <div class="carta">
        <div class="row">

            <div class="col-6" id="imagen2">
                <img src="../styles/img/marvel.jpg" alt="400" height="500px">
            </div>

            <div class="col-6" id="inputs">
                <h1 class="title"> Register </h1> <br>
                <span class="iconify" data-icon="ant-design:google-circle-filled" data-inline="false"></span>

                <form action="register.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            autofocus="" placeholder="Introduzca el nombre" autocomplete="off" name="nombre">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            autofocus="" inputmode="email" placeholder="Introduzca el usuario" autocomplete="off"
                            name="usuario">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Mail</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            autofocus="" inputmode="email" placeholder="Introduzca el correo" autocomplete="off"
                            name="correo">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" autofocus=""
                            inputmode="password" placeholder="Contraseña" autocomplete="off" name="contra">
                    </div> <br>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>

        </div>
    </div>
    <?php

    require_once("DB.php");
    $conn = DB::getInstance()->getConn();

    $name = $_POST['nombre'];
    $username = $_POST['usuario'];
    $mail = $_POST['correo'];
    $password = $_POST['contra'];
    // $passwordCrypted = password_hash($password, PASSWORD_BCRYPT, ['salt' => 'abc']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($name) && !empty($username) && !empty($mail) && !empty($password)) {
            $conn -> query("INSERT INTO users (nombre, username, mail, password) VALUES ('$name', '$username', '$mail', '$password')");
        }
    }
    ?>

</body>

</html>