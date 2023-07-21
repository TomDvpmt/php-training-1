<?php 

namespace PhpTraining\Models;

class FormValidation {
    private string $emptyFieldsError = "<p class='error'>All fields are required.</p>";

    /**
     * Checks if the email input's format is valid.
     * 
     * @access public
     * @package PhpTraining\Models
     * @param string $email
     * @return bool
     */

    public function isEmailValid($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Converts an array of error messages (strings) to a string with html tags.
     * 
     * @access public
     * @package PhpTraining\Models
     * @param array $errorMessages
     * @return string
     */

    public function convertArrayToHtmlString($errorMessages) {
        $enumerator = count($errorMessages) > 1 ? "- " : null;
        $htmlErrors = array_map(fn($message) => "<p class='error'>" . $enumerator . $message . "</p>", $errorMessages);
        return implode("", $htmlErrors);
    }

    /**
     * Gets the html code for login errors display.
     * 
     * @access public
     * @package PhpTraining\Models
     * @param string $email
     * @param string $password
     * @return string
     */

    public function getLoginErrors($email, $password) {
        $loginErrors = [];

        if(empty($email) || empty($password)) {
            return $this->emptyFieldsError;
        }

        if(!self::isEmailValid($email)) {
            array_push($loginErrors, "Wrong email format.");
        }

        $htmlErrors = self::convertArrayToHtmlString($loginErrors);
        return $htmlErrors;
    }

    /**
     * Gets the html code for register errors display.
     * 
     * @access public
     * @package PhpTraining\Models
     * @param string $email
     * @param string $password
     * @param string $passwordConfirm
     * @return string
     */

    public function getRegisterErrors($email, $password, $passwordConfirm) {
        $registerErrors = [];

        if(empty($email) || empty($password) || empty($passwordConfirm)) {
            return $this->emptyFieldsError;
        }

        if(!self::isEmailValid($email)) {
            array_push($registerErrors, "Wrong email format.");
        }

        if(strlen($password) < 8) {
            array_push($registerErrors, "Password must be at least 8 characters long.");
        }

        if($password !== $passwordConfirm) {
            array_push($registerErrors, "Passwords don't match.");
        }

        $htmlErrors = self::convertArrayToHtmlString($registerErrors);
        return $htmlErrors;
    }
}