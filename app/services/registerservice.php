<?php

require_once __DIR__ . '/../repositories/registerrepository.php';

class RegisterService {

    private $registerRepository;

    public function __construct()
    {
        $this->registerRepository = new RegisterRepository();
    }

    public function registerUser(User $user) {
    
    $this->registerRepository->registerUser($user);
    }

    public function usernameExists($username) {
        $user = $this->registerRepository->usernameExists($username);
        if ($user) {
            return true;
        } else {
            return false;
        }
    }
}