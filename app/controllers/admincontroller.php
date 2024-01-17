<?php

require_once __DIR__ . '/../services/adminservice.php';

class AdminController {
    
    private $adminService;
    
    public function __construct() {
        $this->adminService = new AdminService();
    }
    
    
        public function adminindex() {
            $products = $this->adminService->get_all_products();
            require_once __DIR__ . '/../views/admin/admin.php';
            
        }

        public function getProductById($product_id) {
            $product = $this->adminService->get_product_by_id($product_id);
            return $product;
        }

        public function addProduct() {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                require_once __DIR__ . '/../views/admin/addproduct.php';
            }
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $name = htmlspecialchars($_POST['name']);
                $description = htmlspecialchars($_POST['description']);
                $price = htmlspecialchars($_POST['price']);
                $stock = htmlspecialchars($_POST['stock']);
                $image = htmlspecialchars($_POST['image']);
                
                $product = new Product();

                $product->name = $name;
                $product->description = $description;
                $product->price = $price;
                $product->stock = $stock;
                $product->image = $image;

                $this->adminService->add_product($product);
                $this->adminindex();
                
            }
        }

        public function updateProduct() {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                $product_id = $_GET['product_id'];
                $model = $this->adminService->get_product_by_id($product_id);
                require_once __DIR__ . '/../views/admin/updateproduct.php';
            }

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $product_id = intval($_POST['product_id']);
                $name = htmlspecialchars($_POST['name']);
                $description = htmlspecialchars($_POST['description']);
                $price = htmlspecialchars($_POST['price']);
                $stock = htmlspecialchars($_POST['stock']);
                $image = htmlspecialchars($_POST['image']);
                
                $product = new Product();

                $product->product_id = $product_id;
                $product->name = $name;
                $product->description = $description;
                $product->price = $price;
                $product->stock = $stock;
                $product->image = $image;
    
                $this->adminService->update_product($product);
                $this->adminindex();
            }
        }

        public function deleteProduct() {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                $product_id = $_GET['product_id'];
                $this->adminService->delete_product($product_id);
                $this->adminindex();
            }
           
        }         
}
?>