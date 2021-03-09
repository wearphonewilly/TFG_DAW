<?php

$idSerie = $_GET['id'];

$serie = file_get_contents('https://api.themoviedb.org/3/tv/' . $idSerie . ' ?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
$serie = json_decode($serie, true);
if (is_array($serie) || is_object($serie)) {
    foreach ($serie['results'] as $value) {
        $poster = $value['poster_path'];
        $titulo = $value['name'];
        $id = $value['id'];
        echo "<div class=\"carousel__elemento\"> <a href=\"movie.php?id=$id\"> <img id=\"img-main\" src=\"https://image.tmdb.org/t/p/w500$poster\">   <p> $titulo </p> </a> </div>";
    }
}