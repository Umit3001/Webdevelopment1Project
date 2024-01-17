<?php

require_once __DIR__ . '/../repositories/commentrepository.php';

class CommentService {

    private $commentRepository;

    public function __construct()
    {
        $this->commentRepository = new CommentRepository();
    }

   public function getAllComments($product_id) {
       $comments = $this->commentRepository->getAllComments($product_id);
       return $comments;
   }

   public function insertComment($comment) {
       $this->commentRepository->insertComment($comment);
   }
}