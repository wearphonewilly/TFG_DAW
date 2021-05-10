<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Series Main</title>
    <!-- Notyf notifications -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Notyf -->
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <!-- Internal Files -->
    <!-- Internal Files -->
    <link rel="stylesheet" href="../styles/css/movie.css">
    <link rel="stylesheet" href="../styles/css/serie.css">
    <link rel="stylesheet" href="../styles/css/swiper.min.css">
    <link rel="shortcut icon" type="image/png" href="../../styles/img/logoheroku_a22259b35601486.ico" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <style>
        #serieValorar {
            display: none;
        }

        #img-Poster {
            align-items: center;
        }
    </style>
</head>

<body>

    <?php
    require_once("./DB.php");
    require('./jsphp.php');

    include('../html/navbar.html');

    $idSerie = $_GET['id'];
    $serie = file_get_contents('https://api.themoviedb.org/3/tv/' . $idSerie . ' ?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
    $serie = json_decode($serie, true);
    $titulo = $serie['name'];
    $sinopsis = $serie['overview'];
    $poster = $serie['backdrop_path'];
    $posterPath = $serie['poster_path'];
    $tiempoSerie = $serie['episode_run_time'];
    $nextEpisode = $serie['next_episode_to_air']['air_date'];
    $cantidadTemporadas = $serie['number_of_seasons'];
    $temporadas = [];
    foreach ($serie['seasons'] as $value) {
        $temporadaID = $value['id'];
    }
    session_start();
    $user_id = $_SESSION['id'];

    if (is_null($nextEpisode)) {
        $fecha = "0001-01-01";
    } else {
        $fecha = $nextEpisode;
    }

    $PKCombined = "A$user_id$idSerie";

    // TODO: Revisar si me gusta así
    // echo "<script> document.querySelector('body').style.backgroundImage = 'url(\"https://image.tmdb.org/t/p/w500$poster\")'; </script>";


    echo "
    <div class='container'>
        <div class='row'>
            
            <div class='col' style=' margin-top: 5%;'>
                <img id='imgSerie' src='https://image.tmdb.org/t/p/w500/$posterPath' alt='Imagen Login Palomitas' class='img-fluid' id='imgLogin'>
            </div>

            <div class='col' style='margin-top: 5%;'>
                <h1> $titulo </h1>
                <p> $sinopsis </p>
                "; ?>
    <div class="row" style="text-align: center;">
        <div class="col">
            <form action="" method="post">
                <input type="submit" name="btnVista" value="VISTA" id="myBtnVista" />
            </form>
        </div>
        <div class="col">
            <form action="" method="post">
                <input type="submit" name="btnQuiero" value="QUIERO" />
            </form>
        </div>
        <div class="col">
            <form action="" method="post">
                <input type="submit" id='btnEliminar' name="btnEliminar" value="ELIMINAR" />
            </form>
        </div>

        <div class="col">
            <form action="" method="post">
                <input type="submit" id='btnValorar' name="btnValorar" value="VALORAR" />
                <input type="number" name="serieValorar" id="serieValorar" value="<?php echo $idSerie ?>">
            </form>
        </div>

    </div>

    <?php
    require_once("./DB.php");
    require_once('jsphp.php');
    $conn = DB::getInstance()->getConn();

    // Control el vista y quiero de las peliculas
    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnVista'])) {
        session_start();
        $user_id = $_SESSION['id'];
        $querySelect = "SELECT serie_id FROM serie WHERE user_id = $user_id AND serie_id = $idSerie";
        $result = $conn -> query($querySelect);
        if ($result->num_rows > 0) {
            $query = "UPDATE `serie` SET `serie_vista` = '1', `serie_quiero` = '0' WHERE `serie`.`PKCombined` = '$PKCombined'";
            $result = $conn -> query($query);
            notyfSerieActualizada();
        } else {
            $query = "INSERT INTO heroku_a22259b35601486.serie (PKCombined, user_id, title, serie_id, poster_path, proximoEpisodioStart, proximoEpisodioEnd, serie_vista, serie_quiero) VALUES ('$PKCombined', $user_id, '$titulo', '$idSerie', '$posterPath', '$fecha', '$fecha', 1, 0)";
            $result = $conn -> query($query);
            notyfVistoSerie();
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnQuiero'])) {
        session_start();
        $user_id = $_SESSION['id'];
        $querySelect = "SELECT serie_id FROM serie WHERE user_id = $user_id AND serie_id = $idSerie";
        $result = $conn -> query($querySelect);
        if ($result->num_rows > 0) {
            $query = "UPDATE `serie` SET `serie_vista` = '0', `serie_quiero` = '1' WHERE `serie`.`PKCombined` = '$PKCombined'";
            $result = $conn -> query($query);
            notyfSerieActualizada();
        } else {
            $query = "INSERT INTO heroku_a22259b35601486.serie (PKCombined, user_id, title, serie_id, poster_path, proximoEpisodioStart, proximoEpisodioEnd, serie_vista, serie_quiero) VALUES ('$PKCombined', $user_id, '$titulo', '$idSerie', '$posterPath', '$fecha', '$fecha', 0, 1)";
            $result = $conn -> query($query);
            notyfQuieroSerie();
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnEliminar'])) {
        $querySelect = "SELECT serie_id FROM serie WHERE user_id = $user_id AND serie_id = $idSerie";
        $result = $conn -> query($querySelect);
        if ($result->num_rows > 0) {
            $query = "DELETE FROM `serie` WHERE `serie`.`serie_id` = $idSerie AND user_id = $user_id";
            $result = $conn -> query($query);
            notyfEliminadaSerie();
        } else {
            notyfErrorEliminarBBDD();
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnValorar'])) {
        $querySelect = "SELECT serie_id FROM serie WHERE user_id = $user_id AND serie_id = $idSerie AND serie_vista = 1";
        $result = $conn -> query($querySelect);
        if ($result->num_rows > 0) {
            header('Location: valoracionEstrellas.php?&serieValorar=' . $idSerie);
        } else {
            notyfErrorBBDD();
        }
    }

    echo " </div> </div> </div> ";

    echo "<div class=\"row\" style=\"margin-top: -5%;\">";
    $serieTrailer = file_get_contents('https://api.themoviedb.org/3/tv/' . $idSerie . '/videos?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
    $serieTrailer = json_decode($serieTrailer, true);
    if (is_array($serieTrailer) || is_object($serieTrailer)) {
        foreach ($serieTrailer['results'] as $value) {
            $keyYT = $value['key'];
            echo "
            <div class=\"col\" style=\"text-align: center;\">
            <iframe width=\"90%\" height=\"315\" src=\"https://www.youtube.com/embed/$keyYT\" frameborder=\"0\" allowfullscreen picture-in-picture></iframe>
            </div>";
        }
    }

    echo "</div>";

    ?>

    <form action="" method="post">
        <label for="temporada">Temporada</label>
        <select id="selectTemporada" name="temporada" onchange="this.form.submit">
            <?php
            for ($i = 1; $i < $cantidadTemporadas + 1; $i++) {
                echo "<option value=\"$i\">Temporada $i</option>";
            }
            ?>
        </select>
        <input type="submit" name="submit" id="temporada" value="Temporada">
    </form>

    <?php
    if (!empty($_POST['temporada'])) {
        $selected = $_POST['temporada'];
        echo "<br>";
        $temporadaViendo = file_get_contents('https://api.themoviedb.org/3/tv/ ' . $idSerie . ' /season/' . $selected . ' ?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
        $temporadaViendo = json_decode($temporadaViendo, true);

        $episodiosArray = [];
        foreach ($temporadaViendo['episodes'] as $value) {
            $numeroEpisodio = $value['episode_number']; //Printamos numero de episodio
            $nombreEpisodio = $value['name']; // Printamos resumen episodio
            $idEpisodio = $value['id']; // Printamos id episodio
            $idTemporada = $value['season_number']; // Printamos idTemporada

            // $pila = array($value['episode_number'], $value['season'], $value['name'], $value['id']);
            // array_push($authArray, $pila);
            $episodiosArray += array($idEpisodio => $nombreEpisodio);
        }

        $sql = "SELECT serie_id FROM serie WHERE serie_id = '$idSerie' AND user_id = '$user_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $sqlUpdateSerie = "UPDATE `serie` SET `proximoEpisodio`= '$nextEpisode' , `serie_vista`= 0,`serie_quiero`= 0 WHERE `serie_id`='$idSerie'";
            $result = $conn -> query($sqlUpdateSerie);
        } else {
            $sqlInsertSerie = "INSERT INTO heroku_a22259b35601486.serie (user_id, title, serie_id, poster_path, proximoEpisodioStart, proximoEpisodioEnd, serie_vista, serie_quiero) VALUES ('$user_id', '$titulo', '$idSerie', '$posterPath', '$nextEpisode', '$nextEpisode' , '0', '0')";
            $result = $conn -> query($sqlInsertSerie);
        }

        //Descargarnos de la base de datos que episodios hemos visto de esta serie
        $sql = "SELECT capitulo_id FROM capitulo WHERE `serie_id` = $idSerie AND temporada_id = $idTemporada AND user_id = '$user_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $capitulo_id = intval($row['capitulo_id']);

                //Comparamos con los valores del episodeArray
                if (array_key_exists($capitulo_id, $episodiosArray)) {
                    unset($episodiosArray[$capitulo_id]);
                }
            }
        }

        echo "<div id=\"divEpisodes\" class=\"row\"> ";

        // Printamos el array de los restantes en una tabla
        foreach ($episodiosArray as $key => $value) {
            $idEpisodio = $key;

            echo "
            <div class=\"wrapper col\" id='$idEpisodio'>
                <div class=\"notifications\">
                    <div class=\"notifications__item\">
                        <div class=\"notifications__item__content \">
                            <span class=\"notifications__item__title\">$value</span>
                        </div>
                        <div>
                            <div class=\"notifications__item__option archive js-option\">
                                <a onclick=\"checked($idEpisodio, $idTemporada, $user_id, $idSerie)\" id=\"removeBtn\">
                                    <i class=\"fa fa-check\"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ";
        }

        echo "</div>";
    }

    $seriesActores = file_get_contents('https://api.themoviedb.org/3/tv/' . $idSerie . ' /credits?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
    $seriesActores = json_decode($seriesActores, true);
    ?>

    <section class="panel">
        <h2>Actores y Actrices</h2>
        <div class="recentslider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($seriesActores['cast'] as $value) {
                        $imagenCara = $value['profile_path'];
                        $nombre = $value['name'];
                        $id = $value['id'];

                        echo "
                        <div class=\"swiper-slide\">
                            <img src=\"https://image.tmdb.org/t/p/w500$imagenCara\" style=\"height: 90%;\">
                            <h3 class=\"hometitle\">$nombre</h3>
                        </div>";
                    }

                    ?>

                </div>
                <div class="nextdirection recent-next"><img src="../styles/img/right-arrow.svg"> </div>
                <div class="leftdirection recent-prev"><img src="../styles/img/left-arrow.svg"> </div>
                <!-- Add Pagination -->
            </div>
        </div>
    </section>

    <script src="../js/episodeChecked.js"> </script>
    <script src="../js/valoracionEstrellas.js"> </script>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap -->
    <?php include('../html/scripts.html'); ?>
    <!-- Swiper JS -->
    <script src="../js/swiper.min.js"></script>
    <script src="../js/slider.js"></script>

    <script>
        $(document).ready(function () {
            var mostswiper = new Swiper('.recentslider > .swiper-container', {
                nextButton: '.recent-next',
                prevButton: '.recent-prev',
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