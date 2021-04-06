<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Series Main</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../styles/css/output.css">
    <link rel="stylesheet" href="../styles/css/swiper.min.css">
    <link rel="stylesheet" href="../styles/css/apple.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="../js/jquery-3.1.1.min.js"></script>
</head>

<body>
    <div class="wrapper">

        <ul class="menu-bar">
            <li><a href="./main.php">Home</a></li>
            <li> <a href="./main.php">Series</a></li>
            <li><a href="./mainFilms.php">Peliculas</a></li>
            <li><a href="./search.php">Buscar</a></li>
            <li><a href="./miLista.php">Mi Lista</a></li>
            <li><a href="./profile.php" style="float:right" class="active"> Perfil <i class="fa fa-user"></i></a></li>
        </ul>

        <main class="content">
        <section class="panel">
                <h2>Series en emisión</h2>
                <div class="topslider">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">

                            <?php

                            $seriesPopulares = file_get_contents('https://api.themoviedb.org/3/tv/popular?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es&page=1');
                            $seriesPopulares = json_decode($seriesPopulares, true);
                            foreach ($seriesPopulares['results'] as $value) {
                                $poster = $value['poster_path'];
                                $titulo = $value['name'];
                                $id = $value['id'];
                                echo "<div class=\"swiper-slide\"> <a href=\"serie.php?id=$id\"> <img id=\"img-main\" src=\"https://image.tmdb.org/t/p/w500$poster\"> <h3 class=\"hometitle\"> $titulo </h3> </a>  </div>";
                            }
                            ?>

                        </div>
                        <div class="nextdirection top-next"><img src="../styles/img/right-arrow.svg"> </div>
                        <div class="leftdirection top-prev"><img src="../styles/img/left-arrow.svg"> </div>
                    </div>
                </div>
            </section>

            <section class="panel">
                <h2>Series en emisión</h2>
                <div class="topslider">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">

                            <?php

                            $seriesPopulares = file_get_contents('https://api.themoviedb.org/3/tv/on_the_air?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es&page=1');
                            $seriesPopulares = json_decode($seriesPopulares, true);
                            foreach ($seriesPopulares['results'] as $value) {
                                $poster = $value['poster_path'];
                                $titulo = $value['name'];
                                $id = $value['id'];
                                echo "<div class=\"swiper-slide\"> <a href=\"serie.php?id=$id\"> <img id=\"img-main\" src=\"https://image.tmdb.org/t/p/w500$poster\"> <h3 class=\"hometitle\"> $titulo </h3> </a>  </div>";
                            }
                            ?>

                        </div>
                        <div class="nextdirection top-next"><img src="../styles/img/right-arrow.svg"> </div>
                        <div class="leftdirection top-prev"><img src="../styles/img/left-arrow.svg"> </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Swiper JS -->
        <script src="../js/swiper.min.js"></script>
        <script src="../js/slider.js"></script>
    </div>
</body>

</html>