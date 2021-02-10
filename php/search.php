<?php

$busquedaQuery = $_POST["busqueda"];
var_dump($busquedaQuery);

if (strpbrk($busquedaQuery, ' ') !== false) { // Para que los espacios se cambien por %20 y poder hacer bien la api por get
    $busquedaQuery = str_replace(" ", "%20", $busquedaQuery);
    echo $busquedaQuery;
}

$busquedaUser = file_get_contents('https://api.themoviedb.org/3/search/tv?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es&page=1&query=' . $busquedaQuery . '&include_adult=false');
$busquedaUser = json_decode($busquedaUser, true);
print_r($busquedaUser);
