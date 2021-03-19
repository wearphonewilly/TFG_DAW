<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Series Main</title>
    <link rel="stylesheet" href="../styles/css/navbar.css">
    <link rel="stylesheet" href="../styles/css/output.css">
    <link rel="stylesheet" href="../styles/css/apple.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .wrapper {
    padding: 25px 30px;
    background: #FFF;
    box-shadow: 0 2px 5px rgba(0,0,0,.3);
    width: 400px;
    border-radius: 3px;
    margin: 20px;
}

        .wrapper .content ul li .text {
    color: #111;
    padding-left: 10px;
}

    </style>

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

    // TODO: Arreglar imagen de fondo
    echo "<body style=\"background-image:\" = url(\"https://image.tmdb.org/t/p/w500/$poster\");";

    echo "<div class=\"serie\"> 
            <img id=\"img-main\" src=\"https://image.tmdb.org/t/p/w500/$poster\">   
            <img id=\"img-main\" src=\"https://image.tmdb.org/t/p/w500/$posterPath\">   
            <p> $titulo </p>
        </div>";

    $cantidadTemporadas = $serie['number_of_seasons'];
    echo "<br>";
    ?>

    <!-- Use an element to toggle between a like/dislike icon -->
    <i onclick="likeFunction(this)" class="fa fa-thumbs-up"></i>

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

        <!--<div id="episodesdiv">
            <div id="seasons">
                <div class="season activeSeason">
                    <p class="activeSeasonName">Temporada 1</p>
                    <div class="seasonright">
                        <p class="episodesnumber activeSeasonNumber"> 23 </p>
                    </div>
                </div>
                <div class="season">
                    <p class="">Temporada 2</p>
                    <div class="seasonright">
                        <p class="episodesnumber"> 23 </p>
                    </div>
                </div>
                <div class="season">
                    <p class="">Temporada 3</p>
                    <div class="seasonright">
                        <p class="episodesnumber"> 23 </p>
                    </div>
                </div>
                <div class="season">
                    <p class="">Temporada 4</p>
                    <div class="seasonright">
                        <p class="episodesnumber"> 23 </p>
                    </div>
                </div>
                <div class="season">
                    <p class="">Temporada 5</p>
                    <div class="seasonright">
                        <p class="episodesnumber"> 22 </p>
                    </div>
                </div>
                <div class="season">
                    <p class="">Temporada 6</p>
                    <div class="seasonright">
                        <p class="episodesnumber"> 19 </p>
                    </div>
                </div>
                <div class="season">
                    <p class="">Temporada 7</p>
                    <div class="seasonright">
                        <p class="episodesnumber"> 5 </p>
                    </div>
                </div>
            </div>
        </div> -->
    </form>

    <?php
    if (!empty($_POST['temporada'])) {
        $selected = $_POST['temporada'];
        echo "<script> console.log(document.getElementById('selectTemporada').value); </script>";
        var_dump($selected);
        var_dump($idSerie);
        echo "<br>";
        $temporadaViendo = file_get_contents('https://api.themoviedb.org/3/tv/ ' . $idSerie . ' /season/' . $selected . ' ?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
        $temporadaViendo = json_decode($temporadaViendo, true);
        // print_r($temporadaViendo);
        foreach ($temporadaViendo['episodes'] as $value) {
            $numeroEpisodio = $value['episode_number']; //Printamos numero de episodio
            $nombreEpisodio = $value['name']; // Printamos resumen episodio
            $idEpisodio = $value['id']; // Printamos id episodio
            echo "<div> <li> <a href=\"episodio.php?idSerie=$idSerie&idTemporada&$selected&idEpisodio=$idEpisodio\"> $numeroEpisodio $nombreEpisodio </a> <i id=\"removeBtn\" class=\"icon fa fa-trash\"></i> </li> </div>";
        }
    }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="../js/app.js"></script>

</body>

</html>