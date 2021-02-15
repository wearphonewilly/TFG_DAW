<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carousel / Slider con Glider.js</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <div class="contenedor">
        <main class="contenido-principal">
            <img src="img/1.png" alt="Dome of the German Bundestag" class="contenido-principal__imagen">
            <div class="contenido-principal__contenedor">
                <h1 class="contenido-principal__titulo">Dome of the German Bundestag</h1>
                <p class="contenido-principal__resumen">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a commodo orci. Nulla ipsum ante,
                    auctor a odio id, bibendum accumsan mauris.
                </p>
                <p class="contenido-principal__resumen">
                    Fusce malesuada mollis ante, at elementum mi maximus nec. Praesent volutpat, tortor sed condimentum
                    sagittis, mi diam fringilla nibh.
                </p>
            </div>
        </main>

        <div class="carousel">
            <div class="carousel__contenedor">
                <button aria-label="Anterior" class="carousel__anterior">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <div class="carousel__lista">

                    <?php

                    $seriesPopulares = file_get_contents('https://api.themoviedb.org/3/tv/popular?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es&page=1');
                    $seriesPopulares = json_decode($seriesPopulares, true);
                    if (is_array($seriesPopulares) || is_object($seriesPopulares)) {
                        foreach ($seriesPopulares['results'] as $value) {
                            $poster = $value['poster_path'];
                            $titulo = $value['name'];
                            echo "<div class=\"arousel__elemento\"> <img src=\"https://image.tmdb.org/t/p/w500$poster\">  <p> $titulo </p>  </div>";
                        }
                    }
                    ?>

                </div>

                <button aria-label="Siguiente" class="carousel__siguiente">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>

            <div role="tablist" class="carousel__indicadores"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
</body>

</html>