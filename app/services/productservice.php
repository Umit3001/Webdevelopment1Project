<?php 

require_once __DIR__ . '/../repositories/productrepository.php';

class ProductService {
    private $productRepository;

    public function __construct() {
        $this->productRepository = new ProductRepository();
    }

    public function getAllProducts() {
        $products = $this->productRepository->getAllProducts();
        return $products;
    }

    public function getProductById($id) {
        $product = $this->productRepository->getProductById($id);
        return $product;
    }

    public function updateStock($product_id, $quantity) {
        $product = $this->getProductById($product_id);
        $newStock = $product->stock - $quantity;
        $this->productRepository->updateStock($product_id, $newStock);
    }

    public function getSortedProductsByAsc() {
        return $this->productRepository->getSortedProductsByAsc();
    }

    public function getSortedProductsByDesc() {
        return $this->productRepository->getSortedProductsByDesc();
    }

}