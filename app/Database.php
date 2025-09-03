<?php

class Database
{
    private static $instance = null;
    private $connection;

    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'vabprnbp11';

    private function __construct()
    {
        $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->database);

        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
