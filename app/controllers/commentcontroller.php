<?php 

require_once __DIR__ . '/../services/commentservice.php';

class CommentController {
    private $commentsService;

    public function __construct() {
        $this->commentsService = new CommentService();
    }

    public function getAllComments($product_id) {
        $product_id = $_GET['product_id'] ?? null;

        if (!$product_id) {
            header('Location: /products');
            exit();
        }
        $comments = $this->commentsService->getAllComments();
        require_once __DIR__ . '/../views/products/product_details.php';
    }

    public function add_comment() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['user_id']) || !isset($_POST['product_id'])) {
                header('Location: /products');
                exit();
            }

            $user_id = $_SESSION['user_id'];
            $product_id = $_POST['product_id'];
            $comment_text = htmlspecialchars($_POST['comment_text']);

            $comment = new Comment();

            $comment->user_id = $user_id;
            $comment->product_id = $product_id;
            $comment->comment_text = $comment_text;

            $this->commentsService->insertComment($comment); 
            $this->getAllComments($product_id);
        } 
    }
 
}