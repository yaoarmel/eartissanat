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

    public function login_view($title)
    {
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
                $error = "Email ou mot de passe incorrect";
            }
        }

        require_once __DIR__ . '/../Views/auth/login.php';
    }

    public function register_view($title)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'first_name' => $_POST['first_name'] ?? '',
                'last_name' => $_POST['last_name'] ?? '',
                'email' => $_POST['email'] ?? '',
                'password' => $_POST['password'] ?? '',
                'phone_number' => $_POST['phone_number'] ?? '',
                'age' => $_POST['age'] ?? 0,
                'address' => $_POST['address'] ?? '',
                'role' => $_POST['is_artisan'] ?? false ? 'artisant' : 'user'
            ];

            // Validation simple
            if (empty($data['first_name']) || empty($data['last_name']) || 
                empty($data['email']) || empty($data['password']) ||
                empty($data['phone_number'])) {
                $error = "Tous les champs obligatoires doivent être remplis";
            } elseif ($this->userModel->getUserByEmail($data['email'])) {
                $error = "Cette adresse email est déjà utilisée";
            } else {
                if ($this->userModel->createUser($data)) {
                    $user = $this->userModel->getUserByEmail($data['email']);
                    
                    // Si c'est un artisan, créer son profil d'auteur
                    if ($data['role'] === 'artisant') {
                        $authorData = [
                            'user_id' => $user['id'],
                            'bio' => $_POST['bio'] ?? null,
                            'website' => $_POST['website'] ?? null,
                            'social_media_links' => isset($_POST['social_media']) ? json_decode($_POST['social_media'], true) : null,
                            'key_words' => $_POST['key_words'] ?? null
                        ];
                        $this->authorModel->createAuthor($authorData);
                    }

                    Session::setUser($user);
                    
                    // Rediriger vers le tableau de bord approprié
                    if ($data['role'] === 'artisant') {
                        header('Location: /author/dashboard');
                    } else {
                        header('Location: /');
                    }
                    exit;
                } else {
                    $error = "Une erreur est survenue lors de l'inscription";
                }
            }
        }

        require_once __DIR__ . '/../Views/auth/register.php';
    }

    public function logout()
    {
        Session::destroy();
        header('Location: /');
        exit;
    }
}