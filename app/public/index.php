<?php
session_start();
$url = strtok($_SERVER['REQUEST_URI'], '?');

require_once __DIR__ . '/../controllers/homecontroller.php';
require_once __DIR__ . '/../controllers/productscontroller.php';
require_once __DIR__ . '/../controllers/contactcontroller.php';
require_once __DIR__ . '/../controllers/logincontroller.php';
require_once __DIR__ . '/../controllers/registercontroller.php';
require_once __DIR__ . '/../controllers/logoutcontroller.php';
require_once __DIR__ . '/../controllers/commentcontroller.php';
require_once __DIR__ . '/../controllers/shoppingcartcontroller.php';
require_once __DIR__ . '/../controllers/admincontroller.php';
require_once __DIR__ . '/../controllers/contactcontroller.php';
require_once __DIR__ . '/../controllers/usercontroller.php';

try{ 
    
    switch ($url) {
        case '/':
            $homeController = new HomeController();
            $homeController->index();
            break;
        case '/products':
            $productsController = new ProductsController();
            $productsController->products();
            break;
        case '/products/product_details':
            $productsController = new ProductsController();
            $commentController = new CommentController();
            $product_id = $_GET['id'] ?? null;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $commentController->add_comment();
            }
            $productsController->product_details($product_id);
            break;
        case '/contact':
            $contaCtcontroller = new ContactController();
            $contaCtcontroller->contact();
            break;
        case '/login':
            $loginController = new LoginController();
            $loginController->login();
            break;
        case '/register':
            $registerController = new RegisterController();
            $registerController->register();
            break;
        case '/logout':
            $logoutController = new LogoutController();
            $logoutController->logout();
            break;
        case '/user/profile':
            $userController = new UserController();
            $userController->profile();
            break;
        case '/shoppingcart':
            $shoppingcartController = new ShoppingcartController();
            $shoppingcartController->shoppingcart();
            break;
        case '/shoppingcart/add_to_cart':
            $shoppingcartController = new ShoppingcartController();
            $shoppingcartController->add_to_cart();
            break;
        case '/shoppingcart/delete_from_cart':
            $shoppingcartController = new ShoppingcartController();
            $shoppingcartController->delete_from_cart();                
            break;
        case '/shoppingcart/update_cart':
            $shoppingcartController = new ShoppingcartController();
            $shoppingcartController->update_cart();                
            break;
        case '/shoppingcart/confirm_order':
            $shoppingcartController = new ShoppingcartController();
            $shoppingcartController->confirm_order();                
            break;
        case '/admin':
            $adminController = new AdminController();
            $adminController->adminindex();
            break;
        case '/admin/addproduct':
            $adminController = new AdminController();
            $adminController->addproduct();
            break;
        case '/admin/updateproduct':
            $adminController = new AdminController();
            $adminController->updateproduct();
            break;
        case '/admin/deleteproduct':
            $adminController = new AdminController();
            $adminController->deleteproduct();
            break;
        case '/api/products':
            $productsController = new ProductsController();
            $productsController->apiProducts();
            break;
        default:
            http_response_code(404);
            echo '404 - Not Found';
            break;
    }
} catch (Exception $e) {
    http_response_code(500);
    echo 'An error occurred: ' . $e->getMessage();
}
