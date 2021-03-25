<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Lista</title>
    <link rel="stylesheet" href="../styles/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
    <link rel="stylesheet" href="../styles/css/apple.css">
</head>

<body>

    <ul class="menu-bar">
        <li><a href="./main.php">Home</a></li>
        <li><a href="./main.php">Series</a></li>
        <li><a href="./mainFilms.php">Peliculas</a></li>
        <li><a href="./search.php">Buscar</a></li>
        <li><a href="./miLista.php">Mi Lista</a></li>
        <li><a href="./profile.php" style="float:right" class="active"> Perfil   <i class="fa fa-user"></i> </a></li>
    </ul>

    <!-- Aquí tendremos la lista de peliculas y series del usuario del usuario -->
    <?php
    require_once("DB.php");
    $conn = DB::getInstance()->getConn();

    session_start();
    $idUser = $_SESSION['id'];

    $sql = "SELECT * FROM watchme.serie WHERE user_id = $idUser";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<br>";
        while ($row = $result->fetch_assoc()) {
            print_r($row);
        }
    } else {
        sweetalert2();
    }

    ?>

</body>
</html>