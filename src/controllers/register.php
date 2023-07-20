<?php 

require_once $model_dir . "User.php";
require_once $model_dir . "Database.php";

if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password_confirm"])) {
    
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $password_confirm = htmlspecialchars($_POST["password_confirm"]);

    if($email === "" || $password === "" || $password_confirm === "") {
        $register_error = "All fields are required.";
    } elseif(strlen($password) < 8) {
        $register_error = "Password must be at least 8 characters long.";
    } elseif($password !== $password_confirm) {
        $register_error = "Passwords don't match.";
    } else {
        $pdo = (new Database)->connect();            
        $user = new User($email, $password);
        $user->register($pdo);
    }

} else {
    $email = "";
    $password = "";
    $password_confirm = "";
}

require_once $view_dir . "pages/register.php";