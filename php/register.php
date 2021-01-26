<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet" />
    <link href="../styles/css/output.css" rel="stylesheet" />
    <title>Register</title>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
</head>

<body>
    <div class="carta">
        <div class="row">

            <div class="col-6 col-s-12" id="imagen2">
                <img src="../styles/img/marvel.jpg" alt="400" height="500px">
            </div>

            <div class="col-6 col-s-3 menu" id="registerForm">
                <h1 class="title"> Register </h1> <br>
                <span class="iconify" data-icon="ant-design:google-circle-filled" data-inline="false"></span>

                <form action="register.php" method="post">
                    <span>Nombre</span>
                    <input id="emailUser" class="input" type="text" autofocus="" placeholder="Introduzca el nombre"
                        autocomplete="off" name="nombre" /> <br>

                    <span>Username</span>
                    <input id="emailUser" class="input" type="text" autofocus="" inputmode="email"
                        placeholder="Introduzca el usuario" autocomplete="off" name="usuario" /> <br>

                    <span>Mail</span>
                    <input id="emailUser" class="input" type="email" autofocus="" inputmode="email"
                        placeholder="Introduzca el correo" autocomplete="off" name="correo" /> <br>

                    <span>Password</span>
                    <input id="passwordUser" class="input" type="password" autofocus="" inputmode="password"
                        placeholder="Contraseña" autocomplete="off" name="contra" /> <br>

                    <button type="submit" id="save" class="save" name="registro">Register</button>

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