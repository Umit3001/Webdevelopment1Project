<?php

require_once __DIR__ . "/../repositories/orderitemrepository.php";

class OrderitemService {
    private $orderitemRepository;

    public function __construct() {
        $this->orderitemRepository = new OrderitemRepository();
    }

    public function getOrderItems(int $order_id) {
        $order_items = $this->orderitemRepository->getOrderItems($order_id);
        return $order_items;
    }

    public function getOrderItemsByOrderId(int $order_id) {
        $order_items = $this->orderitemRepository->getOrderItemsByOrderId($order_id);
        return $order_items;
    }

    public function addOrderItem(OrderItem $orderItem) {
        $this->orderitemRepository->addOrderItem($orderItem);
    }

    public function deleteOrderItem(int $order_item_id) {
        $this->orderitemRepository->deleteOrderItem($order_item_id);
    }

    public function updateOrderItem(int $order_item_id, int $quantity) {
        $this->orderitemRepository->updateOrderItem($order_item_id, $quantity);
    }
}