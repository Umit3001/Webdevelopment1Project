<?php

require_once __DIR__ . '/../models/product.php';
require_once __DIR__ . '/../repositories/databaseconnection.php';
class AdminRepository extends DatabaseConnection{

    public function get_all_products() {
        $statement = $this->connection->prepare('SELECT * FROM products');
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Product');
        return $statement->fetchAll();
    }

    public function get_product_by_id($product_id) {
        $statement = $this->connection->prepare('SELECT * FROM products WHERE product_id = :product_id');
        $statement->bindParam('product_id', $product_id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Product');
        return $statement->fetch();
    }

    public function add_product($product) {
        $statement = $this->connection->prepare('INSERT INTO products (name, description, price, stock, image) VALUES (:name, :description, :price, :stock, :image)');
        $statement->bindParam('name', $product->name);
        $statement->bindParam('description', $product->description);
        $statement->bindParam('price', $product->price);
        $statement->bindParam('stock', $product->stock);
        $statement->bindParam('image', $product->image);
        $statement->execute();
    }

    public function update_product($product) {
        $statement = $this->connection->prepare('UPDATE products SET name = :name, description = :description, price = :price, stock = :stock, image = :image WHERE product_id = :product_id');
        $statement->bindParam('product_id', $product->product_id);
        $statement->bindParam('name', $product->name);
        $statement->bindParam('description', $product->description);
        $statement->bindParam('price', $product->price);
        $statement->bindParam('stock', $product->stock);
        $statement->bindParam('image', $product->image);
        $statement->execute();
    }

    public function delete_product($product_id) {
        $statement = $this->connection->prepare('DELETE FROM products WHERE product_id = :product_id');
        $statement->bindParam('product_id', $product_id);
        $statement->execute();
    }
}


