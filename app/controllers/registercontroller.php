<?php

require_once __DIR__ . '/../services/registerservice.php';

class RegisterController {

    private $registerService;

    public function __construct()
    {
        $this->registerService = new RegisterService();
    }

    public function register()
    {
    
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once __DIR__ . '/../views/register/register.php';
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = htmlspecialchars($_POST['username']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $email = htmlspecialchars($_POST['email']);

            $user = new User();

            $user->username = $username;
            $user->password = $password;
            $user->email = $email;
            $user->role = "customer";

            if($this->registerService->usernameExists($username)) {
                header('Location: /register?error=Username+already+exists!');
                exit();
            } else {
                $this->registerService->registerUser($user);
                $_SESSION['message'] = 'Registration successful!';
                header('Location: /');
                exit();    
            }     
        }
    }

    public function registerUser()
    {
        require_once __DIR__ . '/../views/register/register.php';
    }
}