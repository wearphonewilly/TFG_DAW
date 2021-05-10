<?php

try {
    // $bdd = new PDO('mysql:host=localhost;dbname=watchme;charset=utf8', 'willyRoot', '');
    $bdd = new PDO('mysql:host=eu-cdbr-west-03.cleardb.net;dbname=heroku_a22259b35601486;charset=utf8', 'bfe19f2ecd2f36', '8c97ee4d');
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}
