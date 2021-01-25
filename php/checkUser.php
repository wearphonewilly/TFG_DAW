<?php

require_once("dbConn.php");
$conn = DB::getInstance()->getConn();

var_dump($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['nombre']) && !empty($_POST['username']) && !empty($_POST['mail']) && !empty($_POST['password'])) {
        $name = $_POST['nombre'];
        $username = $_POST['usuario'];
        $mail = $_POST['correo'];
        $password = $_POST['contra'];
        // $passwordCrypted = password_hash($password, PASSWORD_BCRYPT, ['salt' => 'abc']);

        $name = $conn->real_escape_string($name);
        $username = $conn->real_escape_string($username);
        $mail = $conn->real_escape_string($mail);
        $password = $conn->real_escape_string($password);

        $conn -> query("INSERT INTO users (nombre, username, mail, password) VALUES ('$name', '$username', '$mail', '$password')");
        var_dump($conn);
    }
}
