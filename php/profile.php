<?php
session_start();
var_dump($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../styles/css/charts.css">
    <link rel="stylesheet" href="../styles/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <?php include('../html/navbar.html'); ?>

    <div id="chart-container"></div>


    <h2>Series Vistas</h2>
    <div id="categorias" class="grid-container">

        <?php
        require_once("DB.php");
        $conn = DB::getInstance()->getConn();

        session_start();
        $idUser = $_SESSION['id'];

        $sql = "SELECT * FROM watchme.serie WHERE user_id = $idUser AND serie_vista = 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row ['serie_id'];
                $titulo = $row ['title'];
                $poster = $row ['poster_path'];
                echo "<div class=\"carousel__elemento\"> 
                        <a href=\"serie.php?id=$id\"> 
                            <img id=\"img-category\" src=\"https://image.tmdb.org/t/p/w500$poster\">  
                            <p id=\"p-category\"> $titulo </p> 
                        </a>
                    </div>";
            }
        }
        ?>
    </div>


    <h2>Peliculas Vistas</h2>
    <div id="categorias" class="grid-container">
        <?php
        require_once("DB.php");
        $conn = DB::getInstance()->getConn();

        session_start();
        $idUser = $_SESSION['id'];

        $sql = "SELECT * FROM watchme.peliculas WHERE user_id = $idUser AND peli_vista = 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row ['pelicula_id'];
                $titulo = $row ['title'];
                $posterPath = $row['poster_path_film'];

                echo "<div class=\"carousel__elemento\"> 
                        <a href=\"movie.php?id=$id\"> 
                            <img id=\"img-category\" src=\"https://image.tmdb.org/t/p/w500$posterPath\">  
                            <p id=\"p-category\"> $titulo </p> 
                        </a>
                    </div>";
            }
        }
        ?>

    </div>
    <!-- Bootstrap -->
    <?php include('../html/scripts.html'); ?>

    <script src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    <script src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
    <script src="https://unpkg.com/jquery-fusioncharts@1.1.0/dist/fusioncharts.jqueryplugin.js"></script>
    <script src="../js/charts.js"></script>


</body>
</html>