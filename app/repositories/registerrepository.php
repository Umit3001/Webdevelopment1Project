<?php

require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../repositories/databaseconnection.php';

class RegisterRepository extends DatabaseConnection{

    public function registerUser(User $user) {
        $statement = $this->connection->prepare('INSERT INTO users (username, password, email, role) VALUES (:username, :password, :email, :role)');
        $statement->bindParam(':username', $user->username);
        $statement->bindParam(':password', $user->password);
        $statement->bindParam(':email', $user->email);
        $statement->bindParam(':role', $user->role);
        $statement->execute();
    }

    public function UsernameExists($username) {
        $statement = $this->connection->prepare('SELECT * FROM users WHERE username = :username');
        $statement->bindParam(':username', $username);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
        return $statement->fetch();
    }
}
?>
