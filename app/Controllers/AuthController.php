<?php

namespace App\Controllers;

use App\Models\UserModel;


class AuthController
{
    public function login_view(string $title)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $number = str_replace(' ', '', trim($_POST['phone_number']));
            $password = $_POST['password'];
           

            // Validate the input data
            if (empty($number) || empty($password)) {
                echo "All fields are required.";
                return;
            }

            // Check user credentials
            $userModel = new UserModel();
            if ($userModel->login($number, $password)) {
                // Set session variables or cookies as needed
                session_start();
                $_SESSION['user'] = $userModel->get_user($number); 
                header('Location: /compte');
                exit();
            } else {
                echo "Invalid phone number or password.";
            }
        }
        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ . '/../Views/forms/forms_login_view.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }

    public function register_view(string $title)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $last_name = ucfirst(strtolower(trim($_POST['last_name'])) );
            $first_name = ucwords(strtolower($_POST['first_name']));
            $number = str_replace(' ', '', trim($_POST['phone']));
            if ($_POST['password'] !== $_POST['confirm-password']) {
                echo "Passwords do not match.";
                return;
            }
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            // Validate the input data
            if (empty($last_name) || empty($first_name) || empty($number) || empty($password)) {
                echo "All fields are required.";
                return;
            }

            // Add user to the database
            $userModel = new UserModel();
            if ($userModel->add_user($last_name, $first_name, $number, $password)) {
                header('Location: /login?success=1');
                exit();
            } else {
                echo "Failed to register user.";
            }
        }
        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ . '/../Views/forms/forms_register_view.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }
}