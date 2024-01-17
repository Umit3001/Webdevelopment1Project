<?php

require_once __DIR__ . '/../repositories/adminrepository.php';

class AdminService {
    private $adminRepository;

    public function __construct() {
        $this->adminRepository = new AdminRepository();
    }

    public function get_all_products() {
        return $this->adminRepository->get_all_products();
    }

    public function get_product_by_id($product_id) {
        return $this->adminRepository->get_product_by_id($product_id);
    }

    public function add_product($product) {
        $this->adminRepository->add_product($product);
    }

    public function update_product($product) {
        $this->adminRepository->update_product($product);
    }

    public function delete_product($product_id) {
        $this->adminRepository->delete_product($product_id);
    }
}