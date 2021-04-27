<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Detail</title>
    <link rel="stylesheet" href="episode.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        html {
            background-color: #532e3a;
        }

        /* Add a black background color to the top navigation */
        .topnav {
            background-color: #333;
            overflow: hidden;
        }

        /* Style the links inside the navigation bar */
        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        /* Change the color of links on hover */
        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Add an active class to highlight the current page */
        .topnav a.active {
            background-color: #4CAF50;
            color: white;
        }

        /* Hide the link that should open and close the topnav on small screens */
        .topnav .icon {
            display: none;
        }

        .carta {
            background: rgb(153, 74, 89);
            background: linear-gradient(342deg, rgba(153, 74, 89, 1) 0%, rgba(250, 87, 86, 1) 35%, rgba(244, 148, 83, 1) 65%, rgba(255, 168, 86, 1) 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 100vh;
            margin: 7%;
            border-radius: 25px;
        }

        .divEngloba {
            display: grid;
            grid-template-columns: auto auto;
            padding: 10px;
        }

        .title {
            color: white;
            font-size: 95px;
            letter-spacing: 25px;
            margin-top: -10%;
        }

        .subtitle {
            color: white;
            font-size: 24px;
            margin-top: 1%;
            margin-bottom: 15%;
        }

        .input {
            min-width: 22%;
            height: 20%;
            top: 0%;
            right: 0%;
            z-index: 10;
            border: 1px solid black;
            padding: 15px;
        }

        .save {
            background-color: #d2d3c9;
            color: black;
            border: 1px solid black;
            padding: 15px;
            border-radius: 6px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto;
            padding: 1px;
            margin-right: 29%;
            margin-left: 20%;
        }

        .grid-item {
            margin-bottom: 5%;
        }

        #img-film {
            height: 400px;
            margin-left: -100%;
        }
    </style>

</head>

<body>


    <div class="topnav" id="myTopnav">
        <a href="./main.php">Series</a>
        <a href="./mainFilms.php">Peliculas</a>
        <a href="./search.php">Buscar</a>
        <a href="./calendario.php">Calendario</a>
        <a href="./miLista.php">Mi Lista</a>
        <a href="./profile.php" style="float:right" class="active"> Perfil <i class="fa fa-user"></i> </a>
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
        <div class=\"carta\">
            <div class=\"divEngloba\">
                <div class=\"img-div-film\">
                    <img id=\"img-main\" src=\"https://image.tmdb.org/t/p/w500/$posterPath\" id=\"img-film\">
                </div>
                <div class=\"grid-container\">
                    <div class=\"grid-item\">
                        <h1> $titulo </h1>
                    </div>
                    <div class=\"grid-item\"> "; ?>

                            <form action="" method="post">
                                <input type="submit" id="save\" class="save" name="btnVista" value="VISTA" />
                            </form>
                            <form action="" method="post">
                                <input type="submit" id="save" class="save" name="btnQuiero" value="QUIERO" />
                            </form> 
                    <?php
                    echo "</div>
                    <div class=\"grid-item\">
                        <p>$sinopsis</p>
                    </div>
                </div>
            </div>
        </div>
        ";

    echo "<h1> GENEROS </h1>";

    foreach ($pelicula['genres'] as $value) {
        $categoria = $value['name'];
        echo "$categoria </div>";
    }

    echo "<h1> ACTORES </h1>";

    $actores = file_get_contents('https://api.themoviedb.org/3/movie/' . $idPeli . '/credits?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
    $actores = json_decode($actores, true);

    var_dump(count($actores['cast']));
    foreach ($actores['cast'] as $value) {
        $actor = $value['name'];
        $actorFoto = $value['profile_path'];
        echo "$actor";
        echo "&nbsp; $actorFoto <br/>";
    }


    // Control el vista y quiero de las peliculas
    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnQuiero'])) {
        $sql = "SELECT pelicula_id FROM peliculas WHERE pelicula_id = '$idPeli'";
        var_dump($sql);
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $sqlUpdate = "UPDATE `peliculas` SET `peli_vista`= 0,`peli_quiero`= 1 WHERE `pelicula_id`='$idPeli'";
            var_dump($sqlUpdate);
            $result = $conn -> query($sqlUpdate);
        } else {
            $queryInsert = "INSERT INTO `peliculas`(`pelicula_id`, `runtime`, `poster_path_film`, `user_id`, `peli_vista`, `peli_quiero`) VALUES ('$idPeli', '$tiempoPeli', '$posterPath','$user_id','0','1') " ;
            var_dump($queryInsert);
            $result = $conn -> query($queryInsert);
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnVista'])) {
        $sql = "SELECT pelicula_id FROM peliculas WHERE pelicula_id = '$idPeli'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $sqlUpdate = "UPDATE `peliculas` SET `peli_vista`= 1,`peli_quiero`= 0 WHERE `pelicula_id`='$idPeli'";
            var_dump($sqlUpdate);
            $result = $conn -> query($sqlUpdate);
        } else {
            $queryInsert = "INSERT INTO `peliculas`(`pelicula_id`, `runtime`, `poster_path_film`, `user_id`, `peli_vista`, `peli_quiero`) VALUES ('$idPeli', '$tiempoPeli', '$posterPath','$user_id','1','0') " ;
            $result = $conn -> query($queryInsert);
        }
    }

    ?>

    <script src="../js/navbar.js"></script>

</body>

</html>