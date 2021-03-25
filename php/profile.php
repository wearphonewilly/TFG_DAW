<?php
session_start();

var_dump($_SESSION['username']);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../styles/css/output.css">
    <link rel="stylesheet" href="../styles/css/apple.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <ul class="menu-bar">
        <li><a href="./main.php">Home</a></li>
        <li> <a href="./main.php">Series</a></li>
        <li><a href="./mainFilms.php">Peliculas</a></li>
        <li><a href="./search.php">Buscar</a></li>
        <li><a href="./miLista.php">Mi Lista</a></li>
        <li><a href="./profile.php" style="float:right" class="active"> Perfil   <i class="fa fa-user"></i> </a></li>
    </ul>

    <img src="../styles/img/img1.jpg" alt="Valoración de las diferentes series" id="profileImg">

    <div class="profile-stats">
        <span class="dot"></span>
    </div>

    <div class="stats">
        <p>Series Vistas: </p>
        <p>Peliculas Vistas: </p>
        <p>Total tiempo viendo Series: </p>
        <p>Total tiempo viendo Peliculas: </p>
    </div>


</body>

</html>