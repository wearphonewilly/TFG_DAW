<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Lista</title>
    <link rel="stylesheet" href="../styles/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
    <style>
        h3 {
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="topnav" id="myTopnav">
        <a href="./main.php">Series</a>
        <a href="./mainFilms.php">Peliculas</a>
        <a href="./search.php">Buscar</a>
        <a href="./calendario.php">Calendario</a>
        <a href="./miLista.php" class="active">Mi Lista</a>
        <a href="./profile.php" style="float:right"> Perfil <i class="fa fa-user"></i> </a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"s></i>
        </a>
    </div>

    <h3>Series en progreso</h3>

    <!-- Aquí tendremos la lista de peliculas y series del usuario del usuario -->
    <div id="categorias" class="grid-container">

        <?php
        require_once("./DB.php");
        $conn = DB::getInstance()->getConn();

        session_start();
        $idUser = $_SESSION['id'];
        // TODO: Arreglar el userID  
        $sql = "SELECT * FROM watchme.serie WHERE user_id = $idUser";
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
        } else {
            sweetalert2();
        }
        ?>
    </div>

    <h3>Peliculas quiero</h3>
    <div id="categorias" class="grid-container">

        <?php
        require_once("DB.php");
        $conn = DB::getInstance()->getConn();

        // TODO: Arreglar el userID
        session_start();
        $idUser = $_SESSION['id'];

        $sql = "SELECT * FROM watchme.peliculas WHERE user_id = $idUser AND peli_quiero = 1";
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

    <script src="../js/navbar.js"></script>

</body>
</html>