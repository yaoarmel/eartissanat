<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Author;
use Core\Session;

class AuthController
{
    private User $userModel;
    private Author $authorModel;

    public function __construct()
    {
        $this->userModel = new User();
        $this->authorModel = new Author();
    }

    public function login()
    {
        if (Session::isAuthenticated()) {
            header('Location: /');
            exit;
        }

        $title = 'Connexion';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if ($this->userModel->verifyPassword($email, $password)) {
                $user = $this->userModel->getUserByEmail($email);
                Session::setUser($user);
                
                // Rediriger vers le tableau de bord approprié
                if ($user['role'] === 'admin') {
                    header('Location: /admin');
                } elseif ($user['role'] === 'artisant') {
                    header('Location: /author/dashboard');
                } else {
                    header('Location: /');
                }
                exit;
            } else {
                $_SESSION['error'] = "Email ou mot de passe incorrect";
            }
        }

        \App\Core\View::render('auth/login', [
            'title' => $title
        ]);
    }

    public function register()
    {
        if (Session::isAuthenticated()) {
            header('Location: /');
            exit;
        }

        $title = 'Inscription';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'first_name' => $_POST['first_name'] ?? '',
                'last_name' => $_POST['last_name'] ?? '',
                'email' => $_POST['email'] ?? '',
                'password' => $_POST['password'] ?? '',
                'phone_number' => $_POST['phone_number'] ?? null
            ];

            if (empty($data['first_name']) || empty($data['last_name']) || 
                empty($data['email']) || empty($data['password'])) {
                $_SESSION['error'] = "Tous les champs obligatoires doivent être remplis";
            } elseif ($this->userModel->getUserByEmail($data['email'])) {
                $_SESSION['error'] = "Cette adresse email est déjà utilisée";
            } elseif ($userId = $this->userModel->createUser($data)) {
                $user = $this->userModel->getUserById($userId);
                Session::setUser($user);
                header('Location: /');
                exit;
            } else {
                $_SESSION['error'] = "Une erreur est survenue lors de l'inscription";
            }
        }

        \App\Core\View::render('auth/register', [
            'title' => $title
        ]);
    }

    public function logout()
    {
        Session::destroy();
        header('Location: /');
        exit;
    }
}