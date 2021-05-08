<?php

require_once("./DB.php");
require_once('jsphp.php');
$conn = DB::getInstance()->getConn();
session_start();
$valoracionSerie = $_REQUEST['val'];
$idSerie = $_REQUEST['serie'];

$sql = "SELECT serie_id FROM serie WHERE serie_id = '$idSerie'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $sqlUpdate = "UPDATE `serie` SET `valoracion` = '$valoracionSerie' WHERE `serie`.`serie_id` = '$idSerie' ";
    $result = $conn -> query($sqlUpdate);
    notyfGuardado();
} else {
    notyfErrorGuardarBBDD();
}

echo $query;
echo $result;
