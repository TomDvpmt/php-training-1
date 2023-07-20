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

    public function register($pdo) {
        //
        
    }

    public function login($pdo) {
        if(!self::userExists($pdo)) {
            return false;
        }

        $sql = "";
        $statement = $pdo->prepare();

        // check if email in database
        // if email doesn't exists return response 400 + error message
        // if email exists but wrong password return response 400 + error message
        // else setUserId() and return user info + response 200
        // put user info in session
        // redirect home
    }

    private function userExists($pdo) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $statement = $pdo->prepare($sql);
        $statement->execute(["email" => $this->email]);
        $result = $statement->fetch();
        return !empty($result);
    }

}
