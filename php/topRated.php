<?php

$json = file_get_contents("https://api.themoviedb.org/3/movie/top_rated?api_key=f269df40fe8fe735f1ed701a4bfba1df");
$result = json_decode($json, true);

if (is_array($result) || is_object($result)) {
    foreach ($result['results'] as $value) {
        $poster = $value['poster_path'];
        echo "<img src=\"https://image.tmdb.org/t/p/w500$poster\">";

        $titulo = $value['title'];
        echo "<h3>' . $titulo . '</h3>";
    }
}
