<?php
session_start();

var_dump($_SESSION['username']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Series Main</title>
    <link rel="stylesheet" href="../styles/css/navbar.css">
    <link rel="stylesheet" href="../styles/css/output.css">
    <link rel="stylesheet" href="../styles/css/apple.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
</head>

<body>

    <!--<div class="topnav" id="myTopnav">
        <a href="./main.php" class="active">Home</a>
        <a href="./main.php">Series</a>
        <a href="./mainFilms.php">Peliculas</a>
        <a href="./search.php">Buscar</a>
        <a href="#">Mi Lista</a>
        <a href="./profile.php" style="float:right"><i class="fa fa-fw fa-user"></i> Perfil </a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div> -->

    <ul class="menu-bar">
        <li><a href="./main.php">Home</a></li>
        <li> <a href="./main.php">Series</a></li>
        <li><a href="./mainFilms.php">Peliculas</a></li>
        <li><a href="./search.php">Buscar</a></li>
        <li><a href="./miLista.php">Mi Lista</a></li>
        <li><a href="./profile.php" style="float:right" class="active"> Perfil   <i class="fa fa-user"></i> </a></li>
    </ul>



    <br>

    <?php

    require_once('./api.php');

    ?>

    <div class="carousel">
        <div class="carousel__contenedor">
            <button aria-label="Anterior" class="carousel__anterior">
                <i class="fas fa-chevron-left"></i>
            </button>

            <h2>Series Populares</h2>

            <div class="carousel__lista__seriesPopulares">

                <?php
                    seriesPopulares();
                ?>

            </div>

            <button aria-label="Siguiente" class="carousel__siguiente">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <div role="tablist" class="carousel__indicadores"></div>
    </div>

    <div class="carousel" id="onAir">
        <div class="carousel__contenedor">
            <button aria-label="Anterior" class="carousel__anterior__onAir">
                <i class="fas fa-chevron-left"></i>
            </button>

            <h2>Series On Air</h2>

            <div class="carousel__lista__onAir">

                <?php
                    onAir();
                ?>

            </div>

            <button aria-label="Siguiente" class="carousel__siguiente__onAir">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <div role="tablist" class="carousel__indicadores__onAir"></div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="../js/app.js"></script>
    <script src="../js/navbar.js"></script>

</body>

</html>