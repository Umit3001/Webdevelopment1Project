<?php

require_once __DIR__ . '/../repositories/loginrepository.php';

class LoginService {

    private $loginRepository;

    public function __construct()
    {
        $this->loginRepository = new LoginRepository();
    }

    public function getUserByUsername($username)
    {
        $user = $this->loginRepository->getUserByUsername($username);
        return $user;
    }

    public function getUserByUser_Id($user_id)
    {
        $user = $this->loginRepository->getUserByUser_Id($user_id);
        return $user;
    }
}