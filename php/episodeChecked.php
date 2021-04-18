<?php

require_once("./DB.php");
require_once('jsphp.php');
$conn = DB::getInstance()->getConn();
$idEpisodio = $_REQUEST['ide'];
$idTemporada = $_REQUEST['idt'];
$user_id = $_REQUEST['id'];
$idSerie = $_REQUEST['ids'];

$query = "INSERT INTO watchme.capitulo (capitulo_id, temporada_id, serie_id, user_id, vista) VALUES ($idEpisodio, $idTemporada, $idSerie, $user_id, '1')";
$result = $conn -> query($query);
echo $query;
echo $result;
