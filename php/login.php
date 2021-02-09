<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    header('Location: index.php?');
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>WatchME</title>
    <meta name="description" content="Proyecto final de DAW">

    <!-- Internal Files -->
    <link rel="stylesheet" href="../styles/css/output.css">

    <!-- SweetAlert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="sweetalert2.all.min.js"></script>

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

<div class="container">
    <div class="row">
        <div class="col" style=" margin-top: 5%; margin-bottom: 5%;">
            <img src="../styles/img/popcorn.jpg" alt="Imagen Login Palomitas" height="200px" width="200px"
                 class="img-fluid" id="imgLogin">
        </div>

        <div class="col" style="margin-top: 12%;">
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
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
require_once("DB.php");
require_once('./jsphp.php');

$conn = DB::getInstance()->getConn();
$username = $_POST['usuario'];
$password = $_POST['contra'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($username) || !empty($password)) {
        $sql = "SELECT name FROM heroku_a22259b35601486.users WHERE name = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            header('Location: main.php');
            var_dump($result);
        } else {
            sweetalert2();
        }
    } else {
        sweetalert2();
    }
}
?>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>

</body>

</html>