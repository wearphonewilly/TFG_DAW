<?php

require_once("./DB.php");
require_once('jsphp.php');
$conn = DB::getInstance()->getConn();
session_start();
$user_id = $_SESSION['id'];
$idEpisodio = $_REQUEST['ide'];
$idTemporada = $_REQUEST['idt'];
$idSerie = $_GET['id'];

$query = "INSERT INTO watchme.capitulo (capitulo_id, temporada_id, serie_id, user_id, vista, episode_run_time) VALUES ($idEpisodio, 1, 1, $user_id, '1', '010')";
$result = $conn -> query($query);

if ($result->num_rows > 0) {
    echo "$idEpisodio You called a PHP file Onclick event";
} elseif ($result->num_rows < 0) {
    echo 'Error';
    echo $result;
    echo $query;
}
