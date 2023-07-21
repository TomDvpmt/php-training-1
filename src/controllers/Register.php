<?php

namespace PhpTraining\Controllers;

use PhpTraining\Models\Database;
use PhpTraining\Models\FormValidation;
use PhpTraining\Models\User;

require_once $modelsDir . "User.php";
require_once $modelsDir . "Database.php";
require_once $modelsDir . "FormValidation.php";

class Register {

    public function __construct(
        private string $email = "", 
        private string $password = "", 
        private string $passwordConfirm = "",
        private string $registerErrors = "",
        private array $registerInfo = [
            "email" => "",
            "password" => "",
            "passwordConfirm" => "",
            "errors" => ""
        ]
        )
    {}

    private function hasEmptyFields() {
        return !isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["passwordConfirm"]);
    }

    public function submit() {
        if(self::hasEmptyFields()) {
            return $this->registerInfo;
        }

        $this->email = htmlspecialchars($_POST["email"]);
        $this->password = htmlspecialchars($_POST["password"]);
        $this->passwordConfirm = htmlspecialchars($_POST["passwordConfirm"]);
        $this->registerErrors = (new FormValidation)->getRegisterErrors(
            $this->email, 
            $this->password, 
            $this->passwordConfirm
        );
        $this->registerInfo = [
            "email" => $this->email,
            "password" => $this->password,
            "passwordConfirm" => $this->passwordConfirm,
            "errors" => $this->registerErrors,
        ];

        if(!empty($this->registerErrors)) {
            return $this->registerInfo;
        }

        $pdo = (new Database)->connect();            
        $user = new User($this->email, $this->password);

        $userExists = $user->checkIfUserExists($pdo);
        if($userExists) {
            $this->registerErrors = "<p class='error'>This email is already used. Please choose another one.</p>";
            $this->registerInfo["errors"] = $this->registerErrors;
            return $this->registerInfo;
        }

        $hash = password_hash($this->password, PASSWORD_DEFAULT);

        $sql = "
            INSERT INTO users (email, password_hash)
            VALUES (:email, :password_hash);
        ";

        $statement = $pdo->prepare($sql);
        $statement->execute(["email" => $this->email, "password_hash" => $hash]);

        // TODO : set session data

        header("location: /");
    }
}