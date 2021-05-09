<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="../styles/css/valoracionEstrellas.css">
</head>

<body>

    <?php include('../html/navbar.html'); ?>

    <h1>VALORACIÓN</h1>

    <div class="star-wrapper">
        <a onclick="puntuacionEstrellas('5', <?php echo $_GET['serieValorar'] ?> )" class="fas fa-star s1"></a>
        <a onclick="puntuacionEstrellas('4', <?php echo $_GET['serieValorar'] ?>)" class="fas fa-star s2"></a>
        <a onclick="puntuacionEstrellas('3', <?php echo $_GET['serieValorar'] ?>)" class="fas fa-star s3"></a>
        <a onclick="puntuacionEstrellas('2', <?php echo $_GET['serieValorar'] ?>)" class="fas fa-star s4"></a>
        <a onclick="puntuacionEstrellas('1', <?php echo $_GET['serieValorar'] ?>)" class="fas fa-star s5"></a>
    </div>

    <a href="../php/main.php">Volver al menú</a>

    <script src="https://kit.fontawesome.com/5ea815c1d0.js"></script>
    <script src="../js/valoracionEstrellas.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

</body>

</html>