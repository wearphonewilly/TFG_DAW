<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel="stylesheet" href="../styles/css/output.css">
    <link rel="stylesheet" href="../styles/css/apple.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
</head>

<body>

    <div class="topnav" id="myTopnav">
        <a href="./main.php">Home</a>
        <a href="./main.php">Series</a>
        <a href="./mainFilms.php">Peliculas</a>
        <a href="./search.php">Buscar</a>
        <a href="./miLista.php">Mi Lista</a>
        <a href="./profile.php" style="float:right" class="active"> Perfil <i class="fa fa-user"></i> </a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <!-- Aquí tendremos las películas de la categoria que hayamos seleccionado  -->
    <section id="categoriasSection">

        <div id="categorias" class="grid-container">
            <?php
            $category_id = $_GET['id'];

            $seriesPopulares = file_get_contents('https://api.themoviedb.org/3/discover/movie?api_key=f269df40fe8fe735f1ed701a4bfba1df&with_genres='.$category_id);
            $seriesPopulares = json_decode($seriesPopulares, true);
            if (is_array($seriesPopulares) || is_object($seriesPopulares)) {
                foreach ($seriesPopulares['results'] as $value) {
                    $poster = $value['poster_path'];
                    $titulo = $value['title'];
                    $id = $value['id'];
                    echo "<div class=\"carousel__elemento\"> 
                            <a href=\"movie.php?id=$id\"> 
                                <img id=\"img-category\" src=\"https://image.tmdb.org/t/p/w500$poster\">  
                                <p id=\"p-category\"> $titulo </p> 
                            </a>
                        </div>";
                }
            }
            ?>

        </div>
    </section>
    <script src="../js/navbar.js.js"></script>

</body>
</html>