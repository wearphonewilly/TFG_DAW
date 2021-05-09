<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda</title>
    <link rel="stylesheet" href="../styles/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        img {
            height: 100px;
        }
        h3 {
            font-size: 20px !important;
        }
    </style>
</head>

<body>

    <?php include('../html/navbar.html'); ?>

    <section id="buscador">

        <form action="./search.php" method="post">
            <input type="text" placeholder="Título de la serie o película" name="busqueda" class="search-input"
                id="busqueda">
            <button type="submit" id="searchButton">Buscar <i class="fa fa-search"></i></button>
        </form>

    </section>


    <section id="categoriasSection">

        <div id="categorias" class="grid-container">
            <?php

            $categoriasSeries = file_get_contents('https://api.themoviedb.org/3/genre/movie/list?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
            $categoriasSeries = json_decode($categoriasSeries, true);
            if (is_array($categoriasSeries) || is_object($categoriasSeries)) {
                foreach ($categoriasSeries['genres'] as $value) {
                    $titulo = $value['name'];
                    $category_id = $value['id'];
                    echo "<div class=\"item\"> 
                            <h3> 
                                <a id=\"a-search\" href=\"categoria.php?id=$category_id\">  $titulo  </a> 
                            </h3> 
                        </div>";
                }
            }
            ?>

        </div>
    </section>

    <section>

        <div class="grid-container-busqueda">

        <?php

        $busquedaQuery = $_POST["busqueda"];

        if (strpbrk($busquedaQuery, ' ') !== false) { // Para que los espacios se cambien por %20 y poder hacer bien la api por get
            $busquedaQuery = str_replace(" ", "%20", $busquedaQuery);
        }

        $busquedaUser = file_get_contents('https://api.themoviedb.org/3/search/multi?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es&query=' . $busquedaQuery . '&page=1&include_adult=false');
        $busquedaUser = json_decode($busquedaUser, true);
        if (is_array($busquedaUser) || is_object($busquedaUser)) {
            foreach ($busquedaUser['results'] as $value) {
                $idBusqueda = $value['id'];
                $poster = $value['poster_path'];
                $titulo = $value['original_title'];
                $tipoBusqueda = $value['media_type'];
                $nombreSerie = $value['name'];

                if ($tipoBusqueda === "movie") {
                    echo "<div id=\"divBusqueda\"> 
                        <a id=\"a-search\" href=\"movie.php?id=$idBusqueda\"> <h3> $titulo </h3>
                        <img id=\"'imgPrincipal'\" src=\"https://image.tmdb.org/t/p/w500$poster\">  </a> 
                    </div>";
                } elseif ($tipoBusqueda === "tv") {
                    echo "<div id=\"divBusqueda\"> 
                        <a id=\"a-search\" href=\"serie.php?id=$idBusqueda\"> <h3> $nombreSerie </h3>
                        <img id=\"'imgPrincipal'\" src=\"https://image.tmdb.org/t/p/w500$poster\">  </a> 
                    </div>";
                }
            }
            echo "<script> document.getElementById('categoriasSection').style.display = \"none\"; </script>";
        }

        ?>

        </div>
    </section>

    <!-- Bootstrap -->
    <?php include('../html/scripts.html'); ?>

</body>
</html>