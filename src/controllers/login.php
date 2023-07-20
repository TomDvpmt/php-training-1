<?php 

require_once $model_dir . "User.php";
require_once $model_dir . "Database.php";

if(isset($_POST["email"]) && isset($_POST["password"])) {
    
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    if($email === "" || $password === "") {
        $login_error = "All fields are required.";
    } else {
        $pdo = (new Database)->connect();            
        $user = new User($email, $password);
        $response = $user->login($pdo);
        
        if(!$response) {
            $login_error = "Wrong email and/or password.";
        } else {

            // session
        }

    }
    



} else {
    $email = "";
    $password = "";
}

require_once $view_dir . "pages/login.php";