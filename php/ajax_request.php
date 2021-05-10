<?php

require_once("./DB.php");
require_once('jsphp.php');
$conn = DB::getInstance()->getConn();
session_start();
$idEpisodio = $_REQUEST['ide'];
$idTemporada = $_REQUEST['idt'];
$user_id = $_REQUEST['id'];
$idSerie = $_REQUEST['ids'];

$query = "INSERT INTO heroku_a22259b35601486.capitulo (capitulo_id, temporada_id, serie_id, user_id, vista, episode_run_time) VALUES ($idEpisodio, $idTemporada, $idSerie, $user_id, '1', '010')";
$result = $conn -> query($query);
echo $query;
echo $result;