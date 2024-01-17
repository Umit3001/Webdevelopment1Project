<?php

require_once __DIR__ . "/../models/order_item.php";
require_once __DIR__ . "/../repositories/databaseconnection.php";

class OrderitemRepository extends DatabaseConnection{

    public function getOrderItems(int $user_id) {
        $statement = $this->connection->prepare(
            'SELECT order_items.order_id, order_items.product_id, products.name, products.price, products.image, order_items.quantity 
            FROM order_items 
            INNER JOIN products ON order_items.product_id = products.product_id 
            INNER JOIN orders ON order_items.order_id = orders.order_id
            WHERE orders.user_id = :user_id'
        );
        $statement->bindParam(':user_id', $user_id);
        $statement->execute();

        $orderItems = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $row['order_id'];
            $orderItem->product_id = $row['product_id'];
            $orderItem->quantity = $row['quantity'];

            $product = new Product();
            $product->product_id = $row['product_id'];
            $product->name = $row['name'];
            $product->price = $row['price'];
            $product->image = $row['image'];

            $orderItem->product = $product;

            $orderItems[] = $orderItem;
        }

        return $orderItems;
    }

    public function getOrderItemsByOrderId(int $order_id) {
        $statement = $this->connection->prepare('SELECT * FROM order_items WHERE order_id = :order_id');
        $statement->bindParam(':order_id', $order_id);
        $statement->execute();

        $orderItems = $statement->fetchAll(PDO::FETCH_CLASS, 'OrderItem');
        return $orderItems;
    }

    public function addOrderItem(OrderItem $orderItem) {
        $statement = $this->connection->prepare('INSERT INTO order_items (order_id, product_id, quantity) VALUES (:order_id, :product_id, :quantity)');
        $statement->bindParam(':order_id', $orderItem->order_id);
        $statement->bindParam(':product_id', $orderItem->product_id);
        $statement->bindParam(':quantity', $orderItem->quantity);
        $statement->execute();
    }

    public function deleteOrderItem(int $order_item_id) {
        $statement = $this->connection->prepare('DELETE FROM order_items WHERE order_item_id = :order_item_id');
        $statement->bindParam(':order_item_id', $order_item_id);
        $statement->execute();
    }

    public function updateOrderItem(int $order_item_id, int $quantity) {
        $statement = $this->connection->prepare('UPDATE order_items SET quantity = :quantity WHERE order_item_id = :order_item_id');
        $statement->bindParam(':order_item_id', $order_item_id);
        $statement->bindParam(':quantity', $quantity);
        $statement->execute();
    }
}