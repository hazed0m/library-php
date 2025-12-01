<?php

class Database {
    private $host = "mysql";   
    private $db   = "librarydb";
    private $user = "root";
    private $pass = "rootpassword";
    private $charset = "utf8mb4";

    public $pdo;

    public function connect() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
            return $this->pdo;
        } catch (PDOException $e) {
            die("DB Connection Error: " . $e->getMessage());
        }
    }
}
