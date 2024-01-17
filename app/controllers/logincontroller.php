<?php

require_once __DIR__ . '/../services/loginservice.php';

class LoginController {

    private $loginService;

    public function __construct()
    {
        $this->loginService = new LoginService();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $this->loginUser($username, $password);
        } else {
            require_once __DIR__ . '/../views/login/login.php';
        }
    }

    public function loginUser($username, $password) {
     
        try {
            $user = $this->loginService->getUserByUsername($username);
        } catch (Exception $e) {
  
            $_SESSION['message'] = 'An error occurred: ' . $e->getMessage();
            header('Location: /');
            exit();
        }
    
        if ($user && password_verify($password, $user->password)) {
          
            $_SESSION['user_id'] = $user->user_id;
            $_SESSION['username'] = $user->username;
            $_SESSION['email'] = $user->email;
            $_SESSION['role'] = $user->role;

            if($user->role == 'admin') {
                header('Location: /admin');
                exit();
            }else{
                header('Location: /');
                exit();
            }
        } else {
            header('Location: /login?error=' . urlencode('Incorrect username or password'));
            exit();
        }
    }
}