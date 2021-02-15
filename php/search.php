<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/css/output.css">
    <style>
        img {
            height: 80px;
        }
        div {
            display: inline-flex;
        }
    </style>
</head>

<body>

    <section>

        <form action="./search.php" method="post" styles="border-radius: 5%;">
            <input type="text" placeholder="Buscar..." name="busqueda" class="search-input">
            <button type="submit">Buscar<i class="fa fa-search"></i></button>
        </form>

    </section>

    <section>

        <?php

        $busquedaQuery = $_POST["busqueda"];

        if (strpbrk($busquedaQuery, ' ') !== false) { // Para que los espacios se cambien por %20 y poder hacer bien la api por get
            $busquedaQuery = str_replace(" ", "%20", $busquedaQuery);
        }

        $busquedaUser = file_get_contents('https://api.themoviedb.org/3/search/tv?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es&page=1&query=' . $busquedaQuery . '&include_adult=false');
        $busquedaUser = json_decode($busquedaUser, true);
        if (is_array($busquedaUser) || is_object($busquedaUser)) {
            foreach ($busquedaUser['results'] as $value) {
                $poster = $value['poster_path'];
                $titulo = $value['name'];
                echo "<div id=\"divSeries\"> <h3> $titulo </h3> <img id=\"'imgPrincipal'\" src=\"https://image.tmdb.org/t/p/w500$poster\"> </div>";
            }
        }

        ?>

    </section>

</body>

</html>