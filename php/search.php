<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda</title>
    <link rel="stylesheet" href="../styles/css/output.css">
    <link rel="stylesheet" href="../styles/css/apple.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        img {
            height: 80px;
        }
    </style>
</head>

<body>

    <div class="topnav" id="myTopnav">
        <a href="./main.php">Series</a>
        <a href="./mainFilms.php">Peliculas</a>
        <a href="./search.php">Buscar</a>
        <a href="./calendario.php">Calendario</a>
        <a href="./miLista.php">Mi Lista</a>
        <a href="./profile.php" style="float:right" class="active"> Perfil <i class="fa fa-user"></i> </a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"s></i>
        </a>
    </div>

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
                            <h3> <a id=\"a-search\" href=\"categoria.php?id=$category_id\">  $titulo </h3> </div>";
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

        $busquedaUser = file_get_contents('https://api.themoviedb.org/3/search/multi?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=en-US&query=' . $busquedaQuery . '&page=1&include_adult=false');
        $busquedaUser = json_decode($busquedaUser, true);
        if (is_array($busquedaUser) || is_object($busquedaUser)) {
            foreach ($busquedaUser['results'] as $value) {
                $poster = $value['poster_path'];
                $titulo = $value['original_title'];
                echo "<div id=\"divBusqueda\"> 
                        <h3> $titulo </h3> 
                        <img id=\"'imgPrincipal'\" src=\"https://image.tmdb.org/t/p/w500$poster\"> 
                    </div>";
            }
            echo "<script> document.getElementById('categorias').style.display = \"none\"; </script>";
        }

        ?>

        </div>
    </section>

    <script src="../js/navbar.js"></script>

</body>
</html>