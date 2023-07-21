<?php

use PhpTraining\Models\Database;
use PhpTraining\Models\FormValidation;
use PhpTraining\Models\User;

require_once $modelsDir . "User.php";
require_once $modelsDir . "Database.php";
require_once $modelsDir . "FormValidation.php";


if(isset($_POST["email"]) && isset($_POST["password"])) {
    $validator = new FormValidation;
        
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    $loginErrors = $validator->getLoginErrors($email, $password);

    if(empty($loginErrors)) {
        $pdo = (new Database)->connect();            
        $user = new User($email, $password);
        $userExists = $user->checkIfUserExists($pdo);
        if(!$userExists) {
            $loginErrors = "<p class='error'>Wrong email and/or password.</p>";
        }
        // user->login;
    } 

} 
else {
    $email = "";
    $password = "";
}



require_once $viewsDir . "pages/login.php";