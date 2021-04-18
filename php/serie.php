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

    <div class="topnav" id="myTopnav">
        <a href="./main.php">Series</a>
        <a href="./mainFilms.php">Peliculas</a>
        <a href="./search.php">Buscar</a>
        <a href="./calendario.php">Calendario</a>
        <a href="./miLista.php">Mi Lista</a>
        <a href="./profile.php" style="float:right" class="active"> Perfil <i class="fa fa-user"></i> </a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

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
    $nextEpisode = $serie['next_episode_to_air']['air_date'];
    // TODO: Revisar si me gusta así
    // echo "<script> document.querySelector('body').style.backgroundImage = 'url(\"https://image.tmdb.org/t/p/w500$poster\")'; </script>";

    echo "<div class=\"serie\"> 
            <img id=\"img-main\" src=\"https://image.tmdb.org/t/p/w500/$poster\">   
            <img id=\"img-main\" src=\"https://image.tmdb.org/t/p/w500/$posterPath\">   
            <p> $titulo </p>
        </div>";

    $cantidadTemporadas = $serie['number_of_seasons'];
    var_dump($cantidadTemporadas);
    echo "<br>";

    $temporadas = [];
    foreach ($serie['seasons'] as $value) {
        $temporadaID = $value['id'];
    }
    var_dump($temporadas);
    var_dump($nextEpisode);

    ?>

    <form action="" method="post">
        <input type="submit" name="btnVista" value="VISTA" />
    </form>

    <form action="" method="post">
        <input type="submit" name="btnQuiero" value="QUIERO" />
    </form>

    <?php
    require_once("./DB.php");
    require_once('jsphp.php');
    $conn = DB::getInstance()->getConn();
    session_start();
    $user_id = $_SESSION['id'];

    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnVista'])) {
        $result = $conn -> query("INSERT INTO watchme.serie (user_id, serie_id, poster_path, proximoEpisodio, serie_vista, serie_quiero) VALUES ('$user_id', '$idSerie', '$posterPath', '0001-01-01', '1', '0')");
    } elseif ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btnQuiero'])) {
        $result = $conn -> query("INSERT INTO watchme.serie (user_id, serie_id, poster_path, proximoEpisodio, serie_vista, serie_quiero) VALUES ('$user_id', '$idSerie', '$posterPath', '0001-01-01', '0', '1')");
    }

    ?>

    <form action="" method="post">
        <label for="temporada">Temporada</label>
        <select id="selectTemporada" name="temporada" onchange="this.form.submit">
            <?php
            for ($i = 1; $i < $cantidadTemporadas + 1; $i++) {
                echo "<option value=\"$i\">Temporada $i</option>";
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

        $episodiosArray = [];

        foreach ($temporadaViendo['episodes'] as $value) {
            $numeroEpisodio = $value['episode_number']; //Printamos numero de episodio
            $nombreEpisodio = $value['name']; // Printamos resumen episodio
            $idEpisodio = $value['id']; // Printamos id episodio
            $idTemporada = $value['season_number']; // Printamos idTemporada

            $pila = array($value['episode_number'], $value['season'], $value['name'], $value['id']);
            array_push($authArray, $pila);
            $episodiosArray += array($idEpisodio => $nombreEpisodio);
        }


        $sqlUpdateSerie = "UPDATE `serie` SET `proximoEpisodio`= '$nextEpisode' , `serie_vista`= 0,`serie_quiero`= 0 WHERE `serie_id`='$idSerie'";
        var_dump($sqlUpdateSerie);
        $resultUpdate = $conn->query($sqlUpdateSerie);
        var_dump($resultUpdate);
        //Descargarnos de la base de datos que episodios hemos visto de esta serie
        $sql = "SELECT capitulo_id FROM capitulo WHERE `serie_id` = $idSerie AND temporada_id = $idTemporada";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $capitulo_id = intval($row['capitulo_id']);

                //Comparamos con los valores del episodeArray
                if (array_key_exists($capitulo_id, $episodiosArray)) {
                    unset($episodiosArray[$capitulo_id]);
                }
            }
        } else {
            echo "Todavía no has visto ningún episodio de esta serie";
        }

        // Printamos el array de los restantes en una tabla
        foreach ($episodiosArray as $key => $value) {
            // echo "$key is at $value";
            $idEpisodio = $key;
            echo "<div> 
            <li id='$idEpisodio'> 
                <a href=\"\"> $value </a>
                <a onclick=\"checked($idEpisodio, $idTemporada, $user_id, $idSerie)\" id=\"removeBtn\" class=\"icon fa fa-trash\"></a> 
            </li> 
            </div>";
        }
    }

    ?>

    <script src="../js/episodeChecked.js"> </script>
    <script src="../js/navbar.js"></script>

</body>
</html>