<?php 

require_once $modelDir . "User.php";
require_once $modelDir . "Database.php";
require_once $utilsDir . "user_form_validation.php";

if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["passwordConfirm"])) {
    
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $passwordConfirm = htmlspecialchars($_POST["passwordConfirm"]);

    $registerErrors = getRegisterErrors($email, $password, $passwordConfirm);

    if(empty($registerErrors)) {
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