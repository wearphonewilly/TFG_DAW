<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>actores</h1>
    <?php 

    $actorId = $_GET['id'];
    var_dump($actorId);

    $actores = file_get_contents('https://api.themoviedb.org/3/person/' . $actorId . '?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=es');
    $actores = json_decode($actores, true);
    var_dump($actores);
    ?>
</body>
</html>