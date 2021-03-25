<?php

class DB
{
    /* private $servername   = 'eu-cdbr-west-03.cleardb.net';
    private $username = 'bfe19f2ecd2f36';
    private $password = '8c97ee4d';
    private $db       = 'heroku_a22259b35601486'; */

    private $servername = 'localhost';
    /* private $username = 'willyRoot';
    private $password = ''; */
    private $username = 'root';
    private $password = '';
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
