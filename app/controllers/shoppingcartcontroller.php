<?php 

require_once __DIR__ . "/../services/orderitemservice.php";
require_once __DIR__ . "/../services/orderservice.php";
require_once __DIR__ . "/../services/productservice.php";

class ShoppingcartController {
    private $orderitemService;
    private $orderService;
    private $productService;

    public function __construct() {
        $this->orderitemService = new OrderitemService();
        $this->orderService = new OrderService();
        $this->productService = new ProductService();
    }

    public function shoppingcart() {
        $orderItems = [];
        $totalPrice = 0;
        if (isset($_SESSION['order_id'])) {
            $orderItems = $this->orderitemService->getOrderItemsByOrderId($_SESSION['order_id']);
            foreach ($orderItems as $item) {
                if ($item !== null) {
                    $product = $this->productService->getProductById($item->product_id);
                    if ($product !== null) {
                        $item->product = $product;
                        $totalPrice += $item->quantity * $item->product->price;
                    }
                }
            }
        }

        require_once __DIR__ . '/../views/order/shoppingcart.php';
    }

    public function add_to_cart() {
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];
    
        if (!isset($_SESSION['order_id']) || $_SESSION['order_id'] === null) {
            // Create a new order
            $order_id = $this->orderService->addOrder($_SESSION['user_id']);

            $_SESSION['order_id'] = $order_id;
        }
    
        $orderItem = new OrderItem();
        $orderItem->order_id = $_SESSION['order_id'];
        $orderItem->product_id = $product_id;
        $orderItem->quantity = $quantity;
    
        $this->orderitemService->addOrderItem($orderItem);
    
        header('Location: /shoppingcart');
    }

    public function delete_from_cart() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $order_item_id = $_POST['order_item_id'];

            $this->orderitemService->deleteOrderItem($order_item_id);
            header('Location: /shoppingcart');
            exit();
        }
    }

    public function update_cart() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $order_item_id = $_POST['order_item_id'];
            $quantity = $_POST['quantity'];

            if ($quantity < 1) {
                $this->orderitemService->deleteOrderItem($order_item_id);
            }
            else {
                $this->orderitemService->updateOrderItem($order_item_id, $quantity);
            }

            header('Location: /shoppingcart');
            exit();

        }
    }

    public function confirm_order() {
        $orderItems = $this->orderitemService->getOrderItemsByOrderId($_SESSION['order_id']);
        $this->orderService->confirmOrder($_SESSION['order_id']);

        foreach ($orderItems as $item) {
            $this->productService->updateStock($item->product_id, $item->quantity);
        }

        $_SESSION['confirmed_order_id'] = $_SESSION['order_id'];
        $_SESSION['cart'] = [];
        $_SESSION['order_id'] = null;

    header('Location: /shoppingcart');
    exit();
    } 
}