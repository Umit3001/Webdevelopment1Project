<?php
require_once __DIR__ . '/../models/product.php';
require_once __DIR__ . '/../repositories/databaseconnection.php';

class ProductRepository extends DatabaseConnection{

    public function getAllProducts() {
        $statement = $this->connection->prepare('SELECT * FROM products');
        $statement->execute();

        $products = $statement->fetchAll(PDO::FETCH_CLASS, 'Product');

        return $products;
    }

    public function getProductById($id) {
        $statement = $this->connection->prepare('SELECT * FROM products WHERE product_id = :product_id');
        $statement->execute(['product_id' => $id]);

        $product = $statement->fetchObject('Product');

        return $product;
    }

    public function updateStock($product_id, $newStock) {
        $statement = $this->connection->prepare('UPDATE products SET stock = :stock WHERE product_id = :product_id');
        $statement->bindParam('stock', $newStock);
        $statement->bindParam('product_id', $product_id);
        $statement->execute();
    }

    public function getSortedProductsByAsc() {
        $statement = $this->connection->prepare("SELECT * FROM products ORDER BY price ASC");
        $statement->execute();
    
        $products = $statement->fetchAll(PDO::FETCH_CLASS, 'Product');
    
        return $products;
    }

    public function getSortedProductsByDesc() {
        $statement = $this->connection->prepare("SELECT * FROM products ORDER BY price DESC");
        $statement->execute();
    
        $products = $statement->fetchAll(PDO::FETCH_CLASS, 'Product');
    
        return $products;
    }
}