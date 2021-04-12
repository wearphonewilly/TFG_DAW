<?php

$apiKey = 'f269df40fe8fe735f1ed701a4bfba1df';


function seriesPopulares()
{
    $seriesPopulares = file_get_contents('https://api.themoviedb.org/3/tv/popular?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es&page=1');
    $seriesPopulares = json_decode($seriesPopulares, true);
    foreach ($seriesPopulares['results'] as $value) {
        $poster = $value['poster_path'];
        $titulo = $value['name'];
        $id = $value['id'];
        echo "<div class=\"swiper-slide\"> <a href=\"serie.php?id=$id\"> <img id=\"img-main\" src=\"https://image.tmdb.org/t/p/w500$poster\"> <h3 class=\"hometitle\"> $titulo </h3> </a>  </div>";
    }
}

function onAir()
{
    $seriesPopulares = file_get_contents('https://api.themoviedb.org/3/tv/on_the_air?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es&page=1');
    $seriesPopulares = json_decode($seriesPopulares, true);
    foreach ($seriesPopulares['results'] as $value) {
        $poster = $value['poster_path'];
        $titulo = $value['name'];
        $id = $value['id'];
        echo "<div class=\"swiper-slide\"> <a href=\"serie.php?id=$id\"> <img id=\"img-main\" src=\"https://image.tmdb.org/t/p/w500$poster\"> <h3 class=\"hometitle\"> $titulo </h3> </a>  </div>";
    }
}

function popularFilms()
{
    $seriesPopulares = file_get_contents('https://api.themoviedb.org/3/movie/popular?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
    $seriesPopulares = json_decode($seriesPopulares, true);
    foreach ($seriesPopulares['results'] as $value) {
        $poster = $value['poster_path'];
        $titulo = $value['title'];
        $id = $value['id'];
        echo "<div class=\"swiper-slide\"> <a href=\"movie.php?id=$id\"> <img id=\"imgPrincipal\" src=\"https://image.tmdb.org/t/p/w500$poster\"> <h3 class=\"hometitle\"> $titulo </h3> </a>  </div>";
    }
}

function upcomingFilms()
{
    $seriesPopulares = file_get_contents('https://api.themoviedb.org/3/movie/upcoming?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
    $seriesPopulares = json_decode($seriesPopulares, true);
    foreach ($seriesPopulares['results'] as $value) {
        $poster = $value['poster_path'];
        $titulo = $value['title'];
        $id = $value['id'];
        echo "<div class=\"swiper-slide\"> <a href=\"movie.php?id=$id\"> <img id=\"imgPrincipal\" src=\"https://image.tmdb.org/t/p/w500$poster\"> <h3 class=\"hometitle\"> $titulo </h3> </a>  </div>";
    }
}
