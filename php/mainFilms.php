<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelis Main</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../styles/css/output.css">
    <link rel="stylesheet" href="../styles/css/swiper.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="wrapper">

    <?php

    require '../vendor/autoload.php';

    use Melbahja\Seo\Factory;
    $metatags = Factory::metaTags(
        [
        'title' => 'WatchME',
        'keywords' => 'netflix, series, peliculas, watchMe, estas-viendo, estas-viendo-me, estas-viendo.herokuapp, estas-viendo.herokuapp.com, estas-viendo.heroku, movies page, estas-viendo movies page',
        'author' => 'Willy'
        ]
    );

    $op = new \CoffeeCode\Optimizer\Optimizer();
    echo $op->optimize(
        "WatchMe (Series Page)",
        "Quieres ver encontrar las mejores películas que hay en las diferentes plataformas como netflix, hbo..., entra en nuestra plataforma para descubrir cuáles son",
        "https://www.estas-viendo.herokuapp.com",
        "https://www.upinside.com.br/uploads/images/2017/11/curso-de-html5-preparando-ambiente-de-trabalho-aula-02-1511276983.jpg"
    )->render();

        include('../html/navbar.html'); ?>

        <main class="content">
            <section class="panel">
                <h2>Peliculas Populares</h2>
                <div class="topslider">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">

                            <?php
                            require_once("./api.php");
                            popularFilms();
                            ?>

                        </div>
                        <div class="nextdirection top-next"><img src="../styles/img/right-arrow.svg"> </div>
                        <div class="leftdirection top-prev"><img src="../styles/img/left-arrow.svg"> </div>
                    </div>
                </div>
            </section>

            <section class="panel">
                <h2>Peliculas en emisión</h2>
                <div class="topslider">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">

                            <?php
                            require_once("./api.php");
                            upcomingFilms();
                            ?>

                        </div>
                        <div class="nextdirection top-next"><img src="../styles/img/right-arrow.svg"> </div>
                        <div class="leftdirection top-prev"><img src="../styles/img/left-arrow.svg"> </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Bootstrap -->
        <?php include('../html/scripts.html'); ?>

        <!-- Swiper JS -->
        <script src="../js/swiper.min.js"></script>
        <script src="../js/slider.js"></script>
    </div>
</body>

</html>