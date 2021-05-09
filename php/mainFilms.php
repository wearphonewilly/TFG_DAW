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

        <?php include('../html/navbar.html'); ?>

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
        <!-- Bootstrap -->
    <?php include('../html/scripts.html'); ?>

        <!-- Swiper JS -->
        <script src="../js/swiper.min.js"></script>
        <script src="../js/slider.js"></script>
    </div>
</body>

</html>