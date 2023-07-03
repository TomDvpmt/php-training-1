<?php

function connectToDb() {
    $host = "localhost";
    $dbname = "phptraining";
    
    $dsn = "mysql:host=" . $host . ";dbname=" . $dbname;

    $user = "root";
    $password = "";

    $database = new PDO($dsn, $user, $password);


}