<?php

namespace App\Controllers;

use App\Models\User;
use Core\Session;
use App\Middleware\AuthMiddleware;

class ProfileController
{
    private User $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {
        AuthMiddleware::isAuthenticated();
        $userId = Session::getUserId();
        
        $title = 'Mon profil';
        $user = $this->userModel->getUserById($userId);
        
        \App\Core\View::render('profile/index', [
            'title' => $title,
            'user' => $user
        ]);
    }

    public function edit()
    {
        AuthMiddleware::isAuthenticated();
        $userId = Session::getUserId();
        
        $title = 'Modifier mon profil';
        $user = $this->userModel->getUserById($userId);
        
        \App\Core\View::render('profile/edit', [
            'title' => $title,
            'user' => $user
        ]);
    }

    public function update()
    {
        AuthMiddleware::isAuthenticated();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /profile');
            exit;
        }

        $userId = Session::getUserId();
        $data = [
            'first_name' => $_POST['first_name'] ?? '',
            'last_name' => $_POST['last_name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'phone_number' => $_POST['phone_number'] ?? null
        ];

        // Validation
        if (empty($data['first_name']) || empty($data['last_name']) || empty($data['email'])) {
            $_SESSION['error'] = "Tous les champs obligatoires doivent être remplis";
            header('Location: /profile/edit');
            exit;
        }

        // Vérifier si l'email est déjà utilisé par un autre utilisateur
        $existingUser = $this->userModel->getUserByEmail($data['email']);
        if ($existingUser && $existingUser['id'] != $userId) {
            $_SESSION['error'] = "Cette adresse email est déjà utilisée";
            header('Location: /profile/edit');
            exit;
        }

        // Mise à jour du mot de passe si fourni
        if (!empty($_POST['password'])) {
            $data['password'] = $_POST['password'];
        }

        if ($this->userModel->updateUser($userId, $data)) {
            $_SESSION['success'] = "Profil mis à jour avec succès";
        } else {
            $_SESSION['error'] = "Une erreur est survenue lors de la mise à jour du profil";
        }

        header('Location: /profile');
        exit;
    }
} 