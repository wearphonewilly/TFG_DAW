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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <?php include('../html/navbar.html'); ?>
    
    <!-- Aquí tendremos las películas de la categoria que hayamos seleccionado  -->
    <section id="categoriasSection">

        <div id="categorias" class="grid-container">
            <?php
            $category_id = $_GET['id'];

            $seriesPopulares = file_get_contents('https://api.themoviedb.org/3/discover/movie?api_key=f269df40fe8fe735f1ed701a4bfba1df&with_genres=' . $category_id);
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
    <!-- Bootstrap -->
    <?php include('../html/scripts.html'); ?>

</body>
</html>