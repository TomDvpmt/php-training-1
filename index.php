<?php 

declare(strict_types=1);

require_once "./src/controllers/login.php";

if(isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    login($email, $password);
} else {
    login();
}
