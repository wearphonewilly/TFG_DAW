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
    <link rel="stylesheet" href="../styles/css/output.css">
    <link rel="shortcut icon" type="image/png" href="../../styles/img/logoWatchme.ico" />

    <!-- SweetAlert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Referencia Diseno -->
    <!-- https://dribbble.com/shots/6286426-Email-Subscription-Webpage-Design/attachments/6286426-Email-Subscription-Webpage-Design?mode=media -->

    <!-- Paleta de colores -->
    <!-- https://colorhunt.co/palette/213161 -->

    <style>
        b {
            display: none;
        }

        #passwordDiv {
            margin-top: 30px;
        }

        label {
            font-size: 20px;
        }

        h4 {
            margin-top: 2%;
        }
    </style>

</head>

<body>

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


    <?php

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
                <img src='https://image.tmdb.org/t/p/w500/$posterPath' alt='Imagen Login Palomitas' style='width: 47%' class='img-fluid' id='imgLogin'>
            </div>

            <div class='col' style='margin-top: 5%;'>
                <h1> $titulo </h1>
                <p> $sinopsis </p>
                "; ?>

                <form action="" method="post">
                    <input type="submit" id="save\" class="save" name="btnVista" value="VISTA" />
                </form>
                <form action="" method="post">
                    <input type="submit" id="save" class="save" name="btnQuiero" value="QUIERO" />
                </form> 
                <?php
                echo "<h4> GENEROS </h4>
                ";?>

                <?php
                foreach ($pelicula['genres'] as $value) {
                    $categoria = $value['name'];
                    echo "$categoria &nbsp &nbsp";
                }
                ?>
            </div>
        </div>
    </div>
    <?php

    /*
    
    $actores = file_get_contents('https://api.themoviedb.org/3/movie/' . $idPeli . '/credits?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
    $actores = json_decode($actores, true);
    foreach ($actores['cast'] as $value) {
        $actor = $value['name'];
        $actorFoto = $value['profile_path'];
        echo "<div class=\"swiper-slide\"> <a href=\"movie.php?id=$id\"> <img id=\"imgPrincipal\" src=\"https://image.tmdb.org/t/p/w500$actorFoto\"> <h3 class=\"hometitle\"> $actor </h3> </div>";
    }
    $seriesPopulares = file_get_contents('https://api.themoviedb.org/3/movie/popular?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
    $seriesPopulares = json_decode($seriesPopulares, true);
    foreach ($seriesPopulares['results'] as $value) {
        $poster = $value['poster_path'];
        $titulo = $value['title'];
        $id = $value['id'];
        echo "<div class=\"swiper-slide\"> <a href=\"movie.php?id=$id\"> <img id=\"imgPrincipal\" src=\"https://image.tmdb.org/t/p/w500$poster\"> <h3 class=\"hometitle\"> $titulo </h3> </a>  </div>";
    }
    */

    // Control el vista y quiero de las peliculas
    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnQuiero'])) {
        $sql = "SELECT pelicula_id FROM peliculas WHERE pelicula_id = '$idPeli'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $sqlUpdate = "UPDATE `peliculas` SET `peli_vista`= 0,`peli_quiero`= 1 WHERE `pelicula_id`='$idPeli'";
            $result = $conn -> query($sqlUpdate);
        } else {
            $queryInsert = "INSERT INTO `peliculas`(`pelicula_id`, `runtime`, `poster_path_film`, `user_id`, `peli_vista`, `peli_quiero`) VALUES ('$idPeli', '$tiempoPeli', '$posterPath','$user_id','0','1') " ;
            $result = $conn -> query($queryInsert);
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnVista'])) {
        $sql = "SELECT pelicula_id FROM peliculas WHERE pelicula_id = '$idPeli'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $sqlUpdate = "UPDATE `peliculas` SET `peli_vista`= 1,`peli_quiero`= 0 WHERE `pelicula_id`='$idPeli'";
            $result = $conn -> query($sqlUpdate);
        } else {
            $queryInsert = "INSERT INTO `peliculas`(`pelicula_id`, `runtime`, `poster_path_film`, `user_id`, `peli_vista`, `peli_quiero`) VALUES ('$idPeli', '$tiempoPeli', '$posterPath','$user_id','1','0') " ;
            $result = $conn -> query($queryInsert);
        }
    }
    ?>

    <script src="../js/navbar.js"></script>
    <script src="../js/swiper.min.js"></script>
    <script src="../js/slider.js"></script>


</body>

</html>