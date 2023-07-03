<?php 

$root = htmlspecialchars($_SERVER["DOCUMENT_ROOT"]);

require $root . "/src/model/User.php";
require $root . "/src/model/Database.php";

if(isset($_POST["email"]) && isset($_POST["password"])) {
    
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    if($email === "" || $password === "") {
        $login_error = "All fields are required.";
    } else {
        $pdo = (new Database)->connect();            
        $user = new User($email, $password);
        $user->login($pdo);
    }

} else {
    $email = "";
    $password = "";
}

require $root . "/templates/login.php";