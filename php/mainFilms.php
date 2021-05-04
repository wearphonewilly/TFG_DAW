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

    <script src="../js/jquery-3.1.1.min.js"></script>
</head>

<body>
    <div class="wrapper">

        <div class="topnav" id="myTopnav">
            <a href="./main.php">Series</a>
            <a href="./mainFilms.php" class="active">Peliculas</a>
            <a href="./search.php">Buscar</a>
            <a href="./calendario.php">Calendario</a>
            <a href="./miLista.php">Mi Lista</a>
            <a href="./profile.php" style="float:right"> Perfil <i class="fa fa-user"></i> </a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>

        <main class="content">
            <section class="panel">
                <h2>Películas Populares</h2>
                <div class="mostslider">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">

                        <?php
                        require_once("./api.php");
                        popularFilms();
                        ?>

                        <div class="nextdirection top-next"><img src="../styles/img/right-arrow.svg"> </div>
                        <div class="leftdirection top-prev"><img src="../styles/img/left-arrow.svg"> </div>
                        </div>
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

        <script src="../js/navbar.js"></script>

        <!-- Swiper JS -->
        <script src="../js/swiper.min.js"></script>
        <script src="../js/slider.js"></script>
    </div>
</body>

</html>