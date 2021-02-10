<?php

echo "<script> console.log('holaa'); </script>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/css/output.css">
    <script src="../js/navbar.js" defer></script>
</head>

<body>

    <div class="topnav" id="myTopnav">
        <a href="./main.php" class="active">Home</a>
        <a href="#series">Series</a>
        <a href="#peliculas">Peliculas</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
        <div class="search-container">
            <form action="./search.php" method="post">
                <input type="text" placeholder="Search.." name="busqueda" class="search-input">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>

    <?php

    require_once('./api.php');

    seriesPopulares();

    onAir();

    ?>

</body>

</html>