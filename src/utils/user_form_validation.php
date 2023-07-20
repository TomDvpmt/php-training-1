<?php

$emptyFieldsError = "<p class='error'>All fields are required.</p>";

function isEmailValid($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function convertArrayToHtmlString($errorMessages) {
    $htmlErrors = array_map(fn($message) => "<p class='error'>" . $message . "</p>", $errorMessages);
    return implode("", $htmlErrors);
}

function getLoginErrors($email, $password) {
    global $emptyFieldsError;
    $loginErrors = [];

    if(empty($email) || empty($password)) {
        return $emptyFieldsError;
    }

    if(!isEmailValid($email)) {
        array_push($loginErrors, "Wrong email format.");
    }

    $htmlErrors = convertArrayToHtmlString($loginErrors);
    return $htmlErrors;
}

function getRegisterErrors($email, $password, $passwordConfirm) {
    global $emptyFieldsError;
    $registerErrors = [];

    if(empty($email) || empty($password) || empty($passwordConfirm)) {
        return $emptyFieldsError;
    }

    if(!isEmailValid($email)) {
        array_push($registerErrors, "Wrong email format.");
    }

    if(strlen($password) < 8) {
        array_push($registerErrors, "Password must be at least 8 characters long.");
    }

    if($password !== $passwordConfirm) {
        array_push($registerErrors, "Passwords don't match.");
    }

    $htmlErrors = convertArrayToHtmlString($registerErrors);
    return $htmlErrors;
}