<?php

$idSerie = $_GET['id'];

$serie = file_get_contents('https://api.themoviedb.org/3/tv/' . $idSerie . ' ?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
$serie = json_decode($serie, true);
print_r($serie);
