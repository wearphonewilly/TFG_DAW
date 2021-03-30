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
            echo "
            <div class=\"carousel__elemento\"> 
                <a href=\"serie.php?id=$id\"> 
                    <img id=\"img-main\" src=\"https://image.tmdb.org/t/p/w500$poster\"> 
                    <p> $titulo </p> 
                </a> 
            </div>";
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
            echo "
            <div class=\"carousel__elemento\"> 
                <a href=\"serie.php?id=$id\"> 
                    <img id=\"img-main\" src=\"https://image.tmdb.org/t/p/w500$poster\"> 
                    <p> $titulo </p> 
                </a> 
            </div>";
        }
    }
}

function popularFilms()
{
    $pelisPopulares = file_get_contents('https://api.themoviedb.org/3/movie/popular?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
    $pelisPopulares = json_decode($pelisPopulares, true);
    if (is_array($pelisPopulares) || is_object($pelisPopulares)) {
        foreach ($pelisPopulares['results'] as $value) {
            $poster = $value['poster_path'];
            $titulo = $value['title'];
            $id = $value['id'];
            echo "
            <div class=\"carousel__elemento\"> 
                <a href=\"movie.php?id=$id\"> 
                    <img id=\"img-main\" src=\"https://image.tmdb.org/t/p/w500$poster\">
                    <p> $titulo </p> 
                </a>
            </div>";
        }
    }
}

function upcomingFilms()
{
    $pelisFuturas = file_get_contents('https://api.themoviedb.org/3/movie/upcoming?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
    $pelisFuturas = json_decode($pelisFuturas, true);
    if (is_array($pelisFuturas) || is_object($pelisFuturas)) {
        foreach ($pelisFuturas['results'] as $value) {
            $poster = $value['poster_path'];
            $titulo = $value['title'];
            $id = $value['id'];
            echo "
            <div class=\"carousel__elemento\"> 
                <a href=\"movie.php?id=$id\"> 
                    <img id=\"img-main\" src=\"https://image.tmdb.org/t/p/w500$poster\">
                    <p> $titulo </p> 
                </a> 
            </div>";
        }
    }
}
