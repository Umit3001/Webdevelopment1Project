<?php

require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../repositories/databaseconnection.php';

class LoginRepository extends DatabaseConnection{

    public function getUserByUsername($username) {
        $statement = $this->connection->prepare('SELECT * FROM users WHERE username = :username');
        $statement->execute(['username' => $username]);
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    public function getUserByUser_Id($user_id) {
        $statement = $this->connection->prepare('SELECT * FROM users WHERE user_id = :user_id');
        $statement->execute(['user_id' => $user_id]);
        return $statement->fetch(PDO::FETCH_OBJ);
    }

}
