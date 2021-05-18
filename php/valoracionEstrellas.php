<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="../styles/css/valoracionEstrellas.css">
    <style>
        body {
            color: #fff !important;
        }
    </style>
</head>

<body>

    <?php include('../html/navbar.html'); 
    /*require_once("./DB.php");
    require_once('jsphp.php');
    $conn = DB::getInstance()->getConn();
    
    $querySelect = "SELECT serie_id FROM serie WHERE user_id = $user_id AND serie_id = $idSerie AND serie_vista = 1";
    var_dump($querySelect);
    $result = $conn -> query($querySelect);
    var_dump($result);
    if ($result->num_rows > 0) {
        // echo "<script> alert('".$var."'); </script>";
        // echo "<script> console.log(window.location='valoracionEstrellas.php?serieValorar='".$idSerie."')); </script>";
        header('Location: valoracionEstrellas.php?&serieValorar=' . $idSerie);
    } else {
        notyfErrorBBDD();
    }*/
    ?>

    <h1>VALORACIÓN</h1>

    <div class="star-wrapper">
        <a onclick="puntuacionEstrellas('5', <?php echo $_GET['serieValorar'] ?> )" class="fas fa-star s1"></a>
        <a onclick="puntuacionEstrellas('4', <?php echo $_GET['serieValorar'] ?>)" class="fas fa-star s2"></a>
        <a onclick="puntuacionEstrellas('3', <?php echo $_GET['serieValorar'] ?>)" class="fas fa-star s3"></a>
        <a onclick="puntuacionEstrellas('2', <?php echo $_GET['serieValorar'] ?>)" class="fas fa-star s4"></a>
        <a onclick="puntuacionEstrellas('1', <?php echo $_GET['serieValorar'] ?>)" class="fas fa-star s5"></a>
    </div>

    <?php include('../html/scripts.html'); ?>
    <script src="https://kit.fontawesome.com/5ea815c1d0.js"></script>
    <script src="../js/valoracionEstrellas.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

</body>

</html>
