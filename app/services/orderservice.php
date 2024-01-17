<?php

require_once __DIR__ . "/../repositories/orderrepository.php";

class OrderService {
    private $orderRepository;

    public function __construct() {
        $this->orderRepository = new OrderRepository();
    }

    public function getAllOrderByUserId(int $user_id) {
        $orders = $this->orderRepository->getAllOrderByUserId($user_id);
        return $orders;
    }

    public function addOrder(int $user_id): int {
        $order_id = $this->orderRepository->addOrder($user_id);
        return $order_id;
    }

    public function confirmOrder(int $order_id) {
        $this->orderRepository->confirmOrder($order_id);
        $_SESSION['cart'] = [];
    }
}