<?php 

require_once $modelDir . "User.php";
require_once $modelDir . "Database.php";
require_once $utilsDir . "user_form_validation.php";

if(isset($_POST["email"]) && isset($_POST["password"])) {
        
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    $loginErrors = getLoginErrors($email, $password);

    if(empty($loginErrors)) {
        $pdo = (new Database)->connect();            
        $user = new User($email, $password);
        $userExists = $user->checkIfUserExists($pdo);
        if(!$userExists) {
            $loginErrors = "<p class='error'>Wrong email and/or password.</p>";
        }
    } 

} else {
    $email = "";
    $password = "";
}

require_once $viewDir . "pages/login.php";