<?php

require_once __DIR__ . '/../services/loginservice.php';
require_once __DIR__ . '/../services/orderservice.php';
require_once __DIR__ . '/../services/orderitemservice.php';

class UserController {
    private $loginService;
    private $orderService;
    private $orderItemService;

    public function __construct() {
        $this->loginService = new LoginService();
        $this->orderService = new OrderService();
        $this->orderItemService = new OrderItemService();
    }

    public function profile() {
        if(isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $user = $this->loginService->getUserByUser_Id($user_id);
            $orders = $this->orderService->getAllOrderByUserId($user_id);
            $orderItems = $this->orderItemService->getOrderItems($user_id);
            require_once __DIR__ . '/../views/user/profile.php';
        } else {
            header('Location: /');
            exit();
        }
    }

}