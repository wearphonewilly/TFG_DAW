<?php

$apiKey = 'f269df40fe8fe735f1ed701a4bfba1df';


function seriesPopulares()
{
    $seriesPopulares = file_get_contents('https://api.themoviedb.org/3/tv/popular?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es&page=1');
    $seriesPopulares = json_decode($seriesPopulares, true);
    if (is_array($seriesPopulares) || is_object($seriesPopulares)) {
        foreach ($seriesPopulares['results'] as $value) {
            $poster = $value['poster_path'];
            $titulo = $value['name'];
            $id = $value['id'];
            echo "<div class=\"arousel__elemento\"> <a> <img src=\"https://image.tmdb.org/t/p/w500$poster\">   <p> $titulo </p> </a> </div>";
        }
    }
}

function onAir()
{
    $seriesPopulares = file_get_contents('https://api.themoviedb.org/3/tv/on_the_air?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es&page=1');
    $seriesPopulares = json_decode($seriesPopulares, true);
    if (is_array($seriesPopulares) || is_object($seriesPopulares)) {
        foreach ($seriesPopulares['results'] as $value) {
            $poster = $value['poster_path'];
            $titulo = $value['name'];
            $id = $value['id'];
            echo "<div class=\"arousel__elemento\"> <img src=\"https://image.tmdb.org/t/p/w500$poster\">  <p> $titulo </p>  </div>";
        }
    }
}
