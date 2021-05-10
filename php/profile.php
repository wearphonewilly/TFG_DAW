<?php

session_start();
$userId = $_SESSION['id'];

require_once("./DB.php");
$conn = DB::getInstance()->getConn();

$estrellas5 = "SELECT COUNT(valoracion) FROM heroku_a22259b35601486.serie WHERE user_id = '$userId' AND valoracion = 5";
$estrellas5Result = $conn -> query($estrellas5);
$result5estrellas = mysqli_fetch_row($estrellas5Result);
$numEstrellas5 = $result5estrellas[0];

$estrellas4 = "SELECT COUNT(valoracion) FROM heroku_a22259b35601486.serie WHERE user_id = '$userId' AND valoracion = 4";
$estrellas4Result = $conn -> query($estrellas4);
$result4estrellas = mysqli_fetch_row($estrellas4Result);
$numEstrellas4 = $result4estrellas[0];

$estrellas3 = "SELECT COUNT(valoracion) FROM heroku_a22259b35601486.serie WHERE user_id = '$userId' AND valoracion = 3";
$estrellas3Result = $conn -> query($estrellas3);
$result3estrellas = mysqli_fetch_row($estrellas3Result);
$numEstrellas3 = $result3estrellas[0];

$estrellas2 = "SELECT COUNT(valoracion) FROM heroku_a22259b35601486.serie WHERE user_id = '$userId' AND valoracion = 2";
$estrellas2Result = $conn -> query($estrellas2);
$result2estrellas = mysqli_fetch_row($estrellas2Result);
$numEstrellas2 = $result2estrellas[0];

$estrellas1 = "SELECT COUNT(valoracion) FROM heroku_a22259b35601486.serie WHERE user_id = '$userId' AND valoracion = 1";
$estrellas1Result = $conn -> query($estrellas1);
$result1estrellas = mysqli_fetch_row($estrellas1Result);
$numEstrellas1 = $result1estrellas[0];

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        h2 {
            color: #000;
            padding: 10px 20px;
        }
    </style>
</head>

<body>

    <?php include('../html/navbar.html'); ?>

    <h2>Series Vistas</h2>
    <div id="categorias" class="grid-container">

        <?php
        require_once("DB.php");
        $conn = DB::getInstance()->getConn();

        session_start();
        $idUser = $_SESSION['id'];

        $sql = "SELECT * FROM heroku_a22259b35601486.serie WHERE user_id = $idUser AND serie_vista = 1";
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

        $sql = "SELECT * FROM heroku_a22259b35601486.peliculas WHERE user_id = $idUser AND peli_vista = 1";
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

    <div id="chart-container"></div>

    <!-- Bootstrap -->
    <?php include('../html/scripts.html'); ?>

    <script>
    $(document).ready(function() {
        $("#chart-container").insertFusionCharts({
            type: "doughnut2d",
            width: "100%",
            height: "100%",
            dataFormat: "json",
            dataSource: {
                chart: {
                    caption: "Valoración de las series",
                    enableSmartLabels: false,
                    showpercentvalues: "1",
                    defaultcenterlabel: "Valoración de las series",
                    aligncaptionwithcanvas: "0",
                    captionpadding: "0",
                    decimals: "0",
                    plottooltext: "<b>$percentValue</b> de series valoradas con <b>$label</b>",

                    theme: "fusion"
                },
                data: [ {
                        color: "#29577b",
                        label: "5 estrellas",
                        value: "<?php echo $numEstrellas5; ?>"
                    },
                    {
                        color: "#35c09c",
                        label: "4 estrellas",
                        value: "<?php echo $numEstrellas4; ?>"
                    },
                    {
                        color: "#f6ce49",
                        label: "3 estrellas",
                        value: "<?php echo $numEstrellas3; ?>"
                    },
                    {
                        color: "#f7a35c",
                        label: "2 estrellas",
                        value: "<?php echo $numEstrellas2; ?>"
                    },
                    {
                        color: "#c17979",
                        label: "1 estrella",
                        value: "<?php echo $numEstrellas1; ?>"
                    }

                ]
            }
        });
    })


    </script>

    <script src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    <script src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
    <script src="https://unpkg.com/jquery-fusioncharts@1.1.0/dist/fusioncharts.jqueryplugin.js"></script>


</body>

</html>