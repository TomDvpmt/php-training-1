<?php 

require "./src/model/User.php";

function login(string $email = "", string $password = "") {
    $login_error = "";

    if(isset($_POST["email"]) && isset($_POST["password"])) {
        if($email === "" || $password === "") {
            $login_error = "All fields are required.";
            die;
        } else {
            //
        }
    } 
    require "./templates/login.php";
}