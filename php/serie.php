<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Series Main</title>
    <link rel="stylesheet" href="../styles/css/output.css">
    <link rel="stylesheet" href="../styles/css/apple.css">
    <link rel="stylesheet" href="episode.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <ul class="menu-bar">
        <li><a href="./main.php">Home</a></li>
        <li> <a href="./main.php">Series</a></li>
        <li><a href="./mainFilms.php">Peliculas</a></li>
        <li><a href="./search.php">Buscar</a></li>
        <li><a href="./miLista.php">Mi Lista</a></li>
        <li><a href="./profile.php" style="float:right" class="active"> Perfil <i class="fa fa-user"></i> </a></li>
    </ul>

    <br>

    <?php

    $idSerie = $_GET['id'];

    $serie = file_get_contents('https://api.themoviedb.org/3/tv/' . $idSerie . ' ?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
    $serie = json_decode($serie, true);
    // print_r($serie);
    $titulo = $serie['name'];
    print_r($serie['overview']);
    print_r($serie['original_name']);
    $poster = $serie['backdrop_path'];
    $posterPath = $serie['poster_path'];
    $tiempoSerie = $serie['episode_run_time'];

    // TODO: Revisar si me gusta así
    // echo "<script> document.querySelector('body').style.backgroundImage = 'url(\"https://image.tmdb.org/t/p/w500$poster\")'; </script>";

    echo "<div class=\"serie\"> 
            <img id=\"img-main\" src=\"https://image.tmdb.org/t/p/w500/$poster\">   
            <img id=\"img-main\" src=\"https://image.tmdb.org/t/p/w500/$posterPath\">   
            <p> $titulo </p>
        </div>";

    $cantidadTemporadas = $serie['number_of_seasons'];
    echo "<br>";
    ?>

    <form action="" method="post">
        <input type="submit" name="btnVista" value="VISTA" />
    </form>

    <?php
    require_once("./DB.php");
    require_once('jsphp.php');
    $conn = DB::getInstance()->getConn();
    session_start();
    $user_id = $_SESSION['id'];

    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnVista'])) {
        $result = $conn -> query("INSERT INTO watchme.serie (user_id, serie_id, serie_vista, serie_quiero, titulo, posterPath) VALUES ('$user_id', '$idSerie', '1', '0', '$titulo', '$posterPath')");
    }

    ?>

    <form action="" method="post">
        <label for="temporada">Temporada</label>
        <select id="selectTemporada" name="temporada">
            <?php
            for ($i = 1; $i < $cantidadTemporadas + 1; $i++) {
                echo "<option value=\"$i\">Temporada $i</option>";
                // echo "<option value=\"$i\" " . $selected ? 'selected' : '' . ">Temporada $i</option>";
            }
            ?>
        </select>
        <input type="submit" name="submit" id="temporada" value="Temporada">
    </form>

    <?php
    if (!empty($_POST['temporada'])) {
        $selected = $_POST['temporada'];
        echo "<br>";
        $temporadaViendo = file_get_contents('https://api.themoviedb.org/3/tv/ ' . $idSerie . ' /season/' . $selected . ' ?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
        $temporadaViendo = json_decode($temporadaViendo, true);
        // print_r($temporadaViendo);
        $episodiosArray = [];

        foreach ($temporadaViendo['episodes'] as $value) {
            $numeroEpisodio = $value['episode_number']; //Printamos numero de episodio
            $nombreEpisodio = $value['name']; // Printamos resumen episodio
            $idEpisodio = $value['id']; // Printamos id episodio

            // Guardamos todos los episodios de una temporada en un array
            // array_push($episodiosArray, $nombreEpisodio, $idEpisodio);

            $episodiosArray += array($idEpisodio => $nombreEpisodio);
        }

        echo "<div> 
        <li> 
            <a href=\"episodio.php?idSerie=$idSerie&idTemporada&$selected&idEpisodio=$idEpisodio\"> $numeroEpisodio $nombreEpisodio </a> "; ?>
            <form action="" method="post">
                <input type="submit" name="btnEpisodioVisto" value="EpisodioVisto"/>
            </form>
        <?php echo "</li> </div>";

        print_r($episodiosArray);
        var_dump($_POST['btnEpisodioVisto']);
        echo "hola";
        if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnEpisodioVisto'])) {
            $queryInsert = "INSERT INTO `capitulo`(`capitulo_id`, `temporada_id`, `user_id`, `vista`, `episode_run_time`) VALUES ('$idEpisodio','$cantidadTemporadas','$user_id', '1', '1') " ;
            $result = $conn -> query($queryInsert);
            var_dump($result);
            echo "prubea";
        }
    }

    ?>

    <script src="../js/episodeChecked.js"> </script>

</body>

</html>