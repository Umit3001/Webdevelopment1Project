<?php

require_once __DIR__ . '/../services/productservice.php';
require_once __DIR__ . '/../services/commentservice.php';

class productsController
{
    private $productService;
    private $commentService;

    public function __construct()
    {
        $this->productService = new ProductService();
        $this->commentService = new CommentService();
    }

    public function products()
    {

        $products = $this->productService->getAllProducts();
        require_once __DIR__ . '/../views/products/products.php';

    }

    public function product_details($product_id)
    {
        if ($product_id) {
            $product = $this->productService->getProductById($product_id);
            $comments = $this->commentService->getAllComments($product_id);
            require_once __DIR__ . '/../views/products/product_details.php';
        } else {
            header('Location: /products');
            exit();
        }
    }

    public function apiProducts() {
        $sort = $_GET['sort'] ?? null;
    
        if ($sort === 'price-asc') {
            $products = $this->productService->getSortedProductsByAsc();
        } else if ($sort === 'price-desc') {
            $products = $this->productService->getSortedProductsByDesc();
        } else {
            $products = $this->productService->getAllProducts();
        }

        $json = json_encode($products);
        header('Content-Type: application/json');
        echo $json;
    }

}

