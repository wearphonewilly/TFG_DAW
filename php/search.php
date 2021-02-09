<?php

$busquedaQuery = $_POST["busqueda"];
var_dump(explode(" ", $busquedaQuery));
echo "<script> console.log('" . $busquedaQuery . "'); </script>";

$busquedaUser = file_get_contents('https://api.themoviedb.org/3/search/tv?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es&page=1&query=' . $busquedaQuery . '&include_adult=false');
$busquedaUser = json_decode($busquedaUser, true);
print_r($busquedaUser);
