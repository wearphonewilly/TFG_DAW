<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .tags {
            list-style: none;
            margin: 0;
            overflow: hidden;
            padding: 0;
        }

        .tags li {
            float: left;
        }

        .tag {
            background: #eee;
            border-radius: 3px 0 0 3px;
            color: #999;
            display: inline-block;
            height: 26px;
            line-height: 26px;
            padding: 0 20px 0 23px;
            position: relative;
            margin: 0 10px 10px 0;
            text-decoration: none;
            -webkit-transition: color 0.2s;
        }

        .tag::before {
            background: #fff;
            border-radius: 10px;
            box-shadow: inset 0 1px rgba(0, 0, 0, 0.25);
            content: '';
            height: 6px;
            left: 10px;
            position: absolute;
            width: 6px;
            top: 10px;
        }

        .tag::after {
            background: #fff;
            border-bottom: 13px solid transparent;
            border-left: 10px solid #eee;
            border-top: 13px solid transparent;
            content: '';
            position: absolute;
            right: 0;
            top: 0;
        }

        .tag:hover {
            background-color: blue;
            color: white;
        }

        .tag:hover::after {
            border-left-color: blue;
        }

        .grid-1 {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(15em, 1fr));
            grid-gap: 20px;
        }

        /* items */
        .grid-1 div {
            color: black;
            font-size: 20px;
            padding: 20px;
        }

        .card {
            width: 14rem !important;
            background-color: lightgrey;
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
                <img src='https://image.tmdb.org/t/p/w500/$posterPath' alt='Imagen Login Palomitas' style='width: 47%' class='img-fluid' id='imgLogin'>
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


    echo "<h4 style=\"margin-top: 5%; margin-bottom: 5%;\"> GENEROS </h4>";
    echo "<ul class=\"tags\">";
    foreach ($pelicula['genres'] as $value) {
        $categoria = $value['name'];
        echo "<li><a class=\"tag\">$categoria</a></li>";
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

    include('../html/scripts.html');
    echo "</div>";

    echo "<h4>ACTORES Y ACTRICES</h4>";

    echo "<section class=\"grid-1\">";
    $peliculaActores = file_get_contents('https://api.themoviedb.org/3/movie/' . $idPeli . ' /credits?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
    $peliculaActores = json_decode($peliculaActores, true);
    foreach ($peliculaActores['cast'] as $value) {
        $imagenCara = $value['profile_path'];
        $nombre = $value['name'];
        $id = $value['id'];
        echo "
        <div>
        <div class=\"col-sm\">


            <div class=\"card\" >
                <img class=\"card-img-top\" src=\"https://image.tmdb.org/t/p/w500$imagenCara\" style=\"height: 18%;\">
                <div class=\"card-body\">
                    <h5 class=\"card-title\">$nombre</h5>
                </div>
            </div>
            </div>
            </div>
            ";
    }

    echo "</section> </div> </div>";

    ?>
    </div>

</body>

</html>