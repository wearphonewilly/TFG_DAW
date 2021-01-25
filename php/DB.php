<?php

class DB
{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = 'root';
    private $db = 'watchMe';
    private $conn;
    private static $instance;

    private function __construct()
    {
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->db);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
            echo "NO CONNECTED 🔌";
        } else {
            echo "FULL CONNECTED 🔌";
            //TODO: MIRAR PORQUE FALLA LA CONEXIÓN
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConn()
    {
        return $this->conn;
    }

    public function changeDB($db)
    {
        $this->db = $db;
        $this->conn->select_db($db);
    }
}
