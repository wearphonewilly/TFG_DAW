<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<?php

$json = file_get_contents("https://api.themoviedb.org/3/movie/top_rated?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es");
$result = json_decode($json, true);

if (is_array($result) || is_object($result)) {
    foreach ($result['results'] as $value) {
        $poster = $value['poster_path'];
        $titulo = $value['title'];

        echo "<h3> $titulo </h3><img src=\"https://image.tmdb.org/t/p/w500$poster\">";
    }
}
?>

</body>
</html>