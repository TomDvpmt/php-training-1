<?php

class Database {
    private string $host = "localhost";
    private string $dbname = "phptraining";
    private string $user = "php_user";
    private string $password = "php-password";

    private function setUp() {
        echo "setting up" . "<br />";
    }

    public function connect() {

        self::setUp();

        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
        try {
            $pdo = new PDO($dsn, $this->user, $this->password);
            echo "Connected to db.";
            return $pdo;
        } catch (Exception $e) {
            die("Error : " . $e->getMessage());
        }
    }

}