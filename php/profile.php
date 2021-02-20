<?php

    echo "<script> console.log('holaa'); </script>";
    var_dump(session_id());
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../styles/css/navbar.css">
    <link rel="stylesheet" href="../styles/css/output.css">
</head>

<body>

    <div class="topnav" id="myTopnav">
        <a href="./main.php">Home</a>
        <a href="./main.php">Series</a>
        <a href="./mainFilms.php">Peliculas</a>
        <a href="./search.php">Buscar</a>
        <a href="#">Mi Lista</a>
        <div class="dropdown">
            <a href="./profile.php" style="float:right" class="active"><i class="fa fa-user"></i> Perfil </a>
            <div class="dropdown-content">
                <a href="../index.php">Logout</a>
                <?php
                    session_destroy();
                ?>
            </div>
        </div>

        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

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