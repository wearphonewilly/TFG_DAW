<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>WatchME</title>
    <meta name="description" content="Proyecto final de DAW">

    <!-- Internal Files -->
    <link href="../styles/css/output.css" rel="stylesheet" />

    <!-- SweetAlert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


    <script src="../js/index.js" defer></script>

    <!-- Referencia Diseno -->
    <!-- https://dribbble.com/shots/6286426-Email-Subscription-Webpage-Design/attachments/6286426-Email-Subscription-Webpage-Design?mode=media -->

    <!-- Paleta de colores -->
    <!-- https://colorhunt.co/palette/213161 -->

</head>

<body>

    <div class="carta">
        <div class="row">
            <div class="col-6 col-s-3 menu" id="inputsLogin">
                <h1 class="title"> Login </h1> <br>
                <span class="iconify" data-icon="ant-design:google-circle-filled" data-inline="false"></span>

                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter username" name="usuario">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" 
                            name="contra">
                    </div> <br>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>

            <div class="col-6 col-s-12" id="imagenLogin">
                <img src="../styles/img/popcorn.jpg" alt="300px" height="400px">
            </div>

        </div>
    </div>

    <?php
    require_once("DB.php");
    $conn = DB::getInstance()->getConn();

    $username = $_POST['usuario'];
    $password = $_POST['contra'];

    var_dump($username, $password);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        var_dump($username);
        if (!empty($username) && !empty($password)) {
            echo '1';
            $sql = "SELECT username FROM users where username LIKE '$username' AND password LIKE '$password'";
            var_dump($sql);
            $result = $conn -> query($sql);
            var_dump($result);
            $count = mysql_num_rows($result);
            if ($count == 1) {
                header('main.php');
            } else {
                echo "Usuario incorreccto";
                header('profile.php');
            }
        }
    }


    ?>

</body>

</html>