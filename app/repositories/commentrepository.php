<?php

require_once __DIR__ . '/../models/comment.php';

class CommentRepository extends DatabaseConnection{

    public function getAllComments($product_id) {
        $statement = $this->connection->prepare('SELECT * FROM comments WHERE product_id = :product_id ORDER BY timestamp DESC');
        $statement->execute(['product_id' => $product_id]);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function insertComment($comment) {
        $statement = $this->connection->prepare('INSERT INTO comments (user_id, product_id, comment_text) VALUES (:user_id, :product_id, :comment_text)');
        $statement->bindParam(':user_id', $comment->user_id);
        $statement->bindParam(':product_id', $comment->product_id);
        $statement->bindParam(':comment_text', $comment->comment_text);
        $statement->execute();
    }
}