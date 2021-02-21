<?php

$idPeli = $_GET['id'];

$pelicula = file_get_contents('https://api.themoviedb.org/3/movie/' . $idPeli . ' ?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
$pelicula = json_decode($pelicula, true);
print_r($pelicula);
