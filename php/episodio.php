<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Series Main</title>
    <link rel="stylesheet" href="../styles/css/output.css">
    <link rel="stylesheet" href="../styles/css/apple.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
</head>

<body>

    <ul class="menu-bar">
        <li><a href="./main.php">Home</a></li>
        <li> <a href="./main.php">Series</a></li>
        <li><a href="./mainFilms.php">Peliculas</a></li>
        <li><a href="./search.php">Buscar</a></li>
        <li><a href="./miLista.php">Mi Lista</a></li>
        <li><a href="./profile.php" style="float:right" class="active"> Perfil   <i class="fa fa-user"></i> </a></li>
    </ul>

    <br>

    <h2>Lorem Ipsum</h2>

    <?php 

    $idSerie = $_GET['idSerie'];
    $idTemporada = $_GET['idTemporada'];
    $idEpisodio = $_GET['idEpisodio'];
    var_dump($idSerie, $idEpisodio);

    $episodioSeleccionado = file_get_contents('https://api.themoviedb.org/3/tv/ ' . $idSerie . ' /season/' . $idTemporada . '/episode' . $idEpisodio . ' ?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
    $episodioSeleccionado = json_decode($episodioSeleccionado, true);

    print_r($episodioSeleccionado);

    ?>

    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="../js/app.js"></script>

</body>

</html>