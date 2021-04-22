<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=watchme;charset=utf8', 'willyRoot', '');
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}
