<?php

class HomeController
{
    public function index()
    {
        require_once __DIR__ . '/../views/home/index.php';
    }

    public function products()
    {
        
        require_once __DIR__ . '/../views/products/products.php';
    }
}