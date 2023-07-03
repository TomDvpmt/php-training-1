<?php

class User {
    protected function __construct(
        protected string $email, 
        protected string $password, 
        protected bool $isAdmin = false) {}

    public function login() {

    }

}

