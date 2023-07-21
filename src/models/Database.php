<?php

namespace PhpTraining\Models;

use Exception;
use PDO;

class Database {
    private string $host;
    private string $dbname;
    private string $user;
    private string $password;
    
    public function __construct()
    {
        $this->host = $_SERVER["DB_HOST"];
        $this->dbname = $_SERVER["DB_NAME"];
        $this->user = $_SERVER["DB_USER"];
        $this->password = $_SERVER["DB_PASSWORD"];
    }

    /**
     * Connects to the database with PDO
     * 
     * @return object
     */
    
    public function connect() {
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
        
        try {
            $pdo = new PDO($dsn, $this->user, $this->password);
            return $pdo;
        } catch (Exception $e) {
            die("Error : " . $e->getMessage());
        }
    }

    /**
     * Sets up the database.
     * 
     * Creates tables if the don't exist.
     * 
     */
    
    public function setup() {
        $pdo = self::connect();

        $sql = "
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(100) NOT NULL,
            password_hash VARCHAR(500) NOT NULL
        );
        ";

        $pdo->query($sql);
    }

}