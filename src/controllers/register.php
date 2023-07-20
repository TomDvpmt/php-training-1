<?php 

require_once $modelDir . "User.php";
require_once $modelDir . "Database.php";

if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["passwordConfirm"])) {
    
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $passwordConfirm = htmlspecialchars($_POST["passwordConfirm"]);

    if($email === "" || $password === "" || $passwordConfirm === "") {
        $registerError = "All fields are required.";
    } elseif(strlen($password) < 8) {
        $registerError = "Password must be at least 8 characters long.";
    } elseif($password !== $passwordConfirm) {
        $registerError = "Passwords don't match.";
    } else {
        $pdo = (new Database)->connect();            
        $user = new User($email, $password);
        $user->register($pdo);
    }

} else {
    $email = "";
    $password = "";
    $passwordConfirm = "";
}

require_once $viewDir . "pages/register.php";