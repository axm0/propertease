<?php
// app/Controllers/UserController.php
require_once __DIR__ . '/../Core/Controller.php';
require_once __DIR__ . '/../Models/User.php';

class UserController extends Controller {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = User::authenticate($email, $password);

            if ($user) {
                $_SESSION['user_id'] = $user->UserID;
                $_SESSION['user_name'] = $user->Name;
                header('Location: /propertease/public/home');
                exit;
            } else {
                $error = "Invalid email or password";
                $this->view('login', ['error' => $error]);
            }
        } else {
            $this->view('login');
        }
    }

    public function signup() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $user_type = 'buyer'; // Default user type

            $user = User::create($name, $password, $email, $phone, $user_type);

            if ($user) {
                $_SESSION['user_id'] = $user->UserID;
                $_SESSION['user_name'] = $user->Name;
                header('Location: /propertease/public/home');
                exit;
            } else {
                $error = "Failed to create user";
                $this->view('login', ['error' => $error]);
            }
        } else {
            $this->view('login');
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /propertease/public/login');
        exit;
    }
}