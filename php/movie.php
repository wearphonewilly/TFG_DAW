<?php
if ((isset($_SESSION['username'])) && (isset($_SESSION['id']))) {
    header('Location: ../index.php');
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>WatchME Movie</title>
    <meta name="description"
        content="WatchMe es un proyecto para llevar un seguimiento de las series y peliculas que ves en las diferentes plataformas de contenido">
    <meta name="keywords" content="netflix, series, peliculas, watchMe" />
    <meta name="author" content="Willy" />
    <meta name="copyright" content="Propietario del copyright" />
    <meta name="robots" content="index" />


    <!-- Internal Files -->
    <link rel="stylesheet" href="../styles/css/movie.css">
    <link rel="stylesheet" href="../styles/css/swiper.min.css">
    <link rel="shortcut icon" type="image/png" href="../../styles/img/logoheroku_a22259b35601486.ico" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Referencia Diseno -->
    <!-- https://dribbble.com/shots/6286426-Email-Subscription-Webpage-Design/attachments/6286426-Email-Subscription-Webpage-Design?mode=media -->

    <!-- Paleta de colores -->
    <!-- https://colorhunt.co/palette/213161 -->

    <style>
        a:hover {
            text-decoration: none;
        }
        h2 {
            color: #000 !important;
        }
    </style>
</head>

<body>

    <?php include('../html/navbar.html');

    require_once("./DB.php");
    require_once('jsphp.php');
    $conn = DB::getInstance()->getConn();

    session_start();
    $user_id = $_SESSION['id'];
    $idPeli = $_GET['id'];

    $pelicula = file_get_contents('https://api.themoviedb.org/3/movie/' . $idPeli . ' ?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
    $pelicula = json_decode($pelicula, true);

    $titulo = $pelicula['title'];
    $sinopsis = $pelicula['overview'];
    $poster = $pelicula['backdrop_path'];
    $posterPath = $pelicula['poster_path'];
    $categorias = array_values($pelicula['genres']);
    $peliAdultos = $pelicula['adult'];
    $tiempoPeli = $pelicula['runtime'];

    if ($peliAdultos) {
        $peliAdultos = 1;
    } else {
        $peliAdultos = 0;
    }

    echo "
    <div class='container'>
        <div class='row'>
            
            <div class='col' style=' margin-top: 5%; margin-bottom: 2%;'>
                <img src='https://image.tmdb.org/t/p/w500/$posterPath' alt='Imagen Login Palomitas' style='width: 47%; margin-left: 5%;' class='img-fluid' id='imgLogin'>
            </div>

            <div class='col' style='margin-top: 5%;'>
                <h1> $titulo </h1>
                <p> $sinopsis </p>
                "; ?>
    <div class="row" style="text-align: center;">
        <div class="col">
            <form action="" method="post">
                <input type="submit" id="save\" class="save" name="btnVista" value="VISTA" />
            </form>
        </div>
        <div class="col">
            <form action="" method="post">
                <input type="submit" id="save" class="save" name="btnQuiero" value="QUIERO" />
            </form>
        </div>

        <div class="col">
            <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large"
                data-text="Acabo de ver la nueva película <?php echo $titulo ?> en "
                data-url="http://estas-viendo.herokuapp.com" data-hashtags="WatchMe EstasViendo" data-lang="es"
                data-show-count="false">Tweet</a>
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
    </div>

    <?php

    // Control el vista y quiero de las peliculas
    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnQuiero'])) {
        $sql = "SELECT pelicula_id FROM peliculas WHERE pelicula_id = '$idPeli'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $sqlUpdate = "UPDATE `peliculas` SET `peli_vista`= 0,`peli_quiero`= 1 WHERE `pelicula_id`='$idPeli'";
            $result = $conn -> query($sqlUpdate);
        } else {
            $queryInsert = "INSERT INTO `peliculas`(`pelicula_id`, `nombrePeli`, `runtime`, `poster_path_film`, `user_id`, `peli_vista`, `peli_quiero`) VALUES ('$idPeli', '$titulo', '$tiempoPeli', '$posterPath','$user_id','0','1') " ;
            $result = $conn -> query($queryInsert);
            var_dump($result, $queryInsert);
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnVista'])) {
        $sql = "SELECT pelicula_id FROM peliculas WHERE pelicula_id = '$idPeli'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $sqlUpdate = "UPDATE `peliculas` SET `peli_vista`= 1,`peli_quiero`= 0 WHERE `pelicula_id`='$idPeli'";
            $result = $conn -> query($sqlUpdate);
        } else {
            $queryInsert = "INSERT INTO `peliculas`(`pelicula_id`, `nombrePeli`, `runtime`, `poster_path_film`, `user_id`, `peli_vista`, `peli_quiero`) VALUES ('$idPeli', '$titulo' , '$tiempoPeli', '$posterPath','$user_id','1','0') " ;
            $result = $conn -> query($queryInsert);
        }
    }


    echo "<h4 style=\"margin-top: 5%; margin-bottom: 5%;\"> GENEROS </h4>";
    echo "<ul class=\"tags\">";
    foreach ($pelicula['genres'] as $value) {
        $categoria = $value['name'];
        $categoria_id = $value['id'];
        echo "<li><a class=\"tag\" href=\"categoria.php?id=$categoria_id\">$categoria</a></li>";
    }
    echo "</ul>";
    echo " </div> </div> </div> ";
    echo "<div class=\"row\" style=\"margin-top: 2%;\">";

    $peliTrailer = file_get_contents('https://api.themoviedb.org/3/movie/' . $idPeli . '/videos?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
    $peliTrailer = json_decode($peliTrailer, true);
    if (is_array($peliTrailer) || is_object($peliTrailer)) {
        foreach ($peliTrailer['results'] as $value) {
            $keyYT = $value['key'];
            echo "
            <div class=\"col\" style=\"text-align: center;\">
            <iframe width=\"90%\" height=\"315\" src=\"https://www.youtube.com/embed/$keyYT\" frameborder=\"0\" allowfullscreen picture-in-picture></iframe>
            </div>";
        }
    }

    echo "</div>";
    $peliculaActores = file_get_contents('https://api.themoviedb.org/3/movie/' . $idPeli . '
    /credits?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
    $peliculaActores = json_decode($peliculaActores, true);
    ?>

    <section class="panel">
        <h2>Actores y Actrices</h2>
        <div class="mostslider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($peliculaActores['cast'] as $value) {
                        $imagenCara = $value['profile_path'];
                        $nombre = $value['name'];

                        echo "
                        <div class=\"swiper-slide\">
                            <img src=\"https://image.tmdb.org/t/p/w500$imagenCara\" style=\"height: 90%;\">
                            <h3 class=\"hometitle\">$nombre</h3>
                        </div>";
                    }

                    ?>

                    <div class="swiper-slide"><a href="mostwatched.html"><img src="img/others.png"></a></div>
                </div>
                <div class="nextdirection most-next"><img src="../styles/img/right-arrow.svg"> </div>
                <div class="leftdirection most-prev"><img src="../styles/img/left-arrow.svg"> </div>
                <!-- Add Pagination -->
            </div>
        </div>
    </section>

    <script src="../js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap -->
    <?php include('../html/scripts.html'); ?>
    <!-- Swiper JS -->
    <script src="../js/swiper.min.js"></script>
    <script src="../js/slider.js"></script>
    <script>
            $(document).ready(function () {
                var mostswiper = new Swiper('.mostslider > .swiper-container', {
                    nextButton: '.most-next',
                    prevButton: '.most-prev',
                    slidesPerView: 8,
                    paginationClickable: true,
                    preventClicks: false,
                    preventClicksPropagation: false,
                    spaceBetween: 10,
                    breakpoints: {
                        320: {
                            slidesPerView: 3,
                            spaceBetween: 5
                        },

                        480: {
                            slidesPerView: 3,
                            spaceBetween: 5
                        },

                        768: {
                            slidesPerView: 5,
                            spaceBetween: 5
                        },
                        1024: {
                            slidesPerView: 6,
                            spaceBetween: 10
                        }
                    }
                });
            });
        </script>

</body>

</html>