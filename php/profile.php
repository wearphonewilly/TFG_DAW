<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../styles/css/output.css">
    <link rel="stylesheet" href="../styles/css/apple.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    <img src="../styles/img/marvel.jpg" alt="Valoración de las diferentes series" id="profileImg">

    <div class="profile-stats">
        <span class="dot"></span>
    </div>

    <div class="stats">
        <p>Series Vistas: </p>
        <p>Peliculas Vistas: </p>
        <p>Total tiempo viendo Series: </p>
        <p>Total tiempo viendo Peliculas: </p>
    </div>

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
                $titulo = $row ['titulo'];
                $poster = $row ['posterPath'];
                echo "<div class=\"carousel__elemento\"> 
                        <a href=\"movie.php?id=$id\"> 
                            <img id=\"img-category\" src=\"https://image.tmdb.org/t/p/w500$poster\">  
                            <p id=\"p-category\"> $titulo </p> 
                        </a>
                    </div>";
            }
        } else {
            sweetalert2();
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
        } else {
            sweetalert2();
        }
        ?>

    </div>

    <script src="../js/navbar.js.js"></script>

</body>
</html>