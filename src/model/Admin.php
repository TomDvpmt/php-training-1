<?php

require "./src/model/User.php";

class Admin extends User {
    public function __construct($userId, $username, $email, $password) {
        parent::__construct($userId, $username, $email, $password);
        $this->isAdmin = true;
    }
}