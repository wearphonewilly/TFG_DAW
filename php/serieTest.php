<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Series Main</title>
    <link rel="stylesheet" href="episode.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        html {
            background-color: #532e3a;
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
    $idSerie = $_GET['id'];

    $serie = file_get_contents('https://api.themoviedb.org/3/tv/' . $idSerie . ' ?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
    $serie = json_decode($serie, true);
    $titulo = $serie['name'];
    $overview = $serie['overview'];
    $posterPath = $serie['poster_path'];
    $tiempoSerie = $serie['episode_run_time'];


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
                <div class=\"grid-item\">
                    <button id=\"save\" class=\"save\">Vista</button>
                    <button id=\"save\" class=\"save\">Quiero</button>
                </div>
                <div class=\"grid-item\">
                    <p>$overview</p>
                </div>
            </div>
        </div>
    </div>
    ";
    ?>


</body>

</html>