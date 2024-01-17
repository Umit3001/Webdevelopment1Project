<?php

class DatabaseConnection {
    protected $connection;

    function __construct() {

        try {
            $this->connection = new PDO("mysql:host=mysql;dbname=WebDevelopmentProject", "root", "secret123");

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}