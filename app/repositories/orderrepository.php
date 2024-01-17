<?php

require_once __DIR__ . "/../models/order.php";
require_once __DIR__ . "/../repositories/databaseconnection.php";

class OrderRepository extends DatabaseConnection{

    public function getAllOrderByUserId(int $user_id) {
        $statement = $this->connection->prepare('SELECT order_id, user_id, order_date, status FROM orders WHERE user_id = :user_id');
        $statement->bindParam(':user_id', $user_id);
        $statement->execute();

        $orders = $statement->fetchAll(PDO::FETCH_CLASS, 'Order');

        return $orders;

    }

    public function addOrder(int $user_id): int {
        $statement = $this->connection->prepare('INSERT INTO orders (user_id, status) VALUES (:user_id, :status)');
        $status = 'pending';
        $statement->bindParam(':user_id', $user_id);
        $statement->bindParam(':status', $status);
        $statement->execute();

        return (int) $this->connection->lastInsertId();
    }

    public function confirmOrder(int $order_id) {
        $statement = $this->connection->prepare('UPDATE orders SET status = :status WHERE order_id = :order_id');
        $status = 'confirmed';
        $statement->bindParam(':status', $status);
        $statement->bindParam(':order_id', $order_id);
        $statement->execute();
    }


}