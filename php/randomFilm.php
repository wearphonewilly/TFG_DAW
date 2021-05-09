<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>

    <h1>RANDOM FILM</h1>

    <?php
    $pelicula = file_get_contents('https://api.themoviedb.org/3/movie/latest?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
    $pelicula = json_decode($pelicula, true);
    var_dump($pelicula['id']);
    $randomPeli = rand(1, $pelicula['id']);
    echo $randomPeli;
    $pelicula = file_get_contents('https://api.themoviedb.org/3/movie/' . $randomPeli . ' ?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
    $pelicula = json_decode($pelicula, true);

    // TODO: Hacerr if que compruebe

    $titulo = $pelicula['title'];
    $sinopsis = $pelicula['overview'];
    $poster = $pelicula['backdrop_path'];
    $posterPath = $pelicula['poster_path'];
    $categorias = array_values($pelicula['genres']);
    $peliAdultos = $pelicula['adult'];
    $tiempoPeli = $pelicula['runtime'];

    echo "
    <div class='container'>
        <div class='row'>
            
            <div class='col' style=' margin-top: 5%; margin-bottom: 2%;'>
                <img src='https://image.tmdb.org/t/p/w500/$posterPath' alt='Imagen Login Palomitas' style='width: 47%; margin-left: 5%;' class='img-fluid' id='imgLogin'>
            </div>

            <div class='col' style='margin-top: 5%;'>
                <h1> $titulo </h1>
                <p> $sinopsis </p>
                "; ?>
    <div class="row" style="text-align: center;">
        <div class="col">
            <form action="" method="post">
                <input type="submit" id="save\" class="save" name="btnVista" value="VISTA" />
            </form>
        </div>
        <div class="col">
            <form action="" method="post">
                <input type="submit" id="save" class="save" name="btnQuiero" value="QUIERO" />
            </form>
        </div>

        <div class="col">
            <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large"
                data-text="Acabo de ver la nueva película <?php echo $titulo ?> en "
                data-url="http://estas-viendo.herokuapp.com" data-hashtags="WatchMe EstasViendo" data-lang="es"
                data-show-count="false">Tweet</a>
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
    </div>

    <?php

       // Control el vista y quiero de las peliculas
    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnQuiero'])) {
        $sql = "SELECT pelicula_id FROM peliculas WHERE pelicula_id = '$idPeli'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $sqlUpdate = "UPDATE `peliculas` SET `peli_vista`= 0,`peli_quiero`= 1 WHERE `pelicula_id`='$idPeli'";
            $result = $conn -> query($sqlUpdate);
        } else {
            $queryInsert = "INSERT INTO `peliculas`(`pelicula_id`, `runtime`, `poster_path_film`, `user_id`, `peli_vista`, `peli_quiero`) VALUES ('$idPeli', '$tiempoPeli', '$posterPath','$user_id','0','1') " ;
            $result = $conn -> query($queryInsert);
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnVista'])) {
        $sql = "SELECT pelicula_id FROM peliculas WHERE pelicula_id = '$idPeli'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $sqlUpdate = "UPDATE `peliculas` SET `peli_vista`= 1,`peli_quiero`= 0 WHERE `pelicula_id`='$idPeli'";
            $result = $conn -> query($sqlUpdate);
        } else {
            $queryInsert = "INSERT INTO `peliculas`(`pelicula_id`, `runtime`, `poster_path_film`, `user_id`, `peli_vista`, `peli_quiero`) VALUES ('$idPeli', '$tiempoPeli', '$posterPath','$user_id','1','0') " ;
            $result = $conn -> query($queryInsert);
        }
    }


    echo "<h4 style=\"margin-top: 5%; margin-bottom: 5%;\"> GENEROS </h4>";
    echo "<ul class=\"tags\">";
    foreach ($pelicula['genres'] as $value) {
        $categoria = $value['name'];
        echo "<li><a class=\"tag\">$categoria</a></li>";
    }
    echo "</ul>";
    echo " </div> </div> </div> ";

    ?>


    <?php include('../html/scripts.html'); ?>
</body>
</html>