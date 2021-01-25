<?php

$error = $_SERVER["REDIRECT_STATUS"];

$error_title = '';
$error_message = '';

if ($error == 404) {
    $error_title = '404 Not Found';
    $error_message = 'The document requested was not found on this server.';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Error</title>
    <link href='https://fonts.googleapis.com/css?family=Anton|Passion+One|PT+Sans+Caption' rel='stylesheet'
        type='text/css'>
    <link rel="stylesheet" href="styles/css/output.css">

    <script src="./js/error404.js" defer></script>
    <!-- https://dribbble.com/shots/5257475-Daily-UI-008-404-Error -->
    <!-- https://codepen.io/Ahmed_B_Hameed/pen/LkqNmp -->
</head>

<body>

    <div id="clouds">
        <div class="cloud x1"></div>
        <div class="cloud x1_5"></div>
        <div class="cloud x2"></div>
        <div class="cloud x3"></div>
        <div class="cloud x4"></div>
        <div class="cloud x5"></div>
    </div>
    <div class='c'>
        <div class='_404'>404</div>
        <hr>
        <div class='_1'>THE PAGE</div>
        <div class='_2'>WAS NOT FOUND</div>
        <a class='btn' href='#'>BACK TO MARS</a>
    </div>

</body>

</html>