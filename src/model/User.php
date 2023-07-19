<?php

class User {
    public function __construct(
        private string $email, 
        private string $password, 
        private int $userId = 0,
        private bool $isAdmin = false,
        private array $purchasedItems = []
        ) {}

    private function setUserId($id) {
        $this->userId = $id;
    }

    public function login($pdo) {
        // check in database
        // if no user return error message
        // else setUserId() and return user info
        // put user info in session
        header("Location: " . "/");
    }

}
