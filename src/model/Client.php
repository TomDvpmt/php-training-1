<?php

require "./src/model/User.php";

class Client extends User {
    public function __construct($userId, $username, $email, $password, $isAdmin, private array $purchasedItems = [])
    {
        parent::__construct($userId, $username, $email, $password, $isAdmin);
        $this->purchasedItems = $purchasedItems;
    }
    
    public function getPurchasedItems($userId) {
        //
    }
}