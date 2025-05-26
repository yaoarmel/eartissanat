<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\AuthorModel;

class CompteController
{
    public function Compte(string $title)
    {
        session_start();

        $authorModel = new AuthorModel();
        $isAuthor = $authorModel->isAuthor($_SESSION['user']['id']);
        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ .'/../Views/compte/compte.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }

    public function Modifier_profil(string $title)
    {
        session_start();

        if (isset($_POST) && !empty($_POST)) {
            // Traitement du formulaire de modification de profil
            $last_name = htmlspecialchars(trim($_POST['last_name']));
            $first_name = htmlspecialchars(trim($_POST['first_name']));
            $email = htmlspecialchars(trim($_POST['email']));
            $age = htmlspecialchars(trim($_POST['age']));
            $adresse = htmlspecialchars(trim($_POST['address']));
            $phone_number = htmlspecialchars(trim($_POST['phone_number']));

            $userModel = new UserModel();
            $userModel->update_user(
                $_SESSION['user']['id'],
                $last_name,
                $first_name,
                $phone_number,
                $email,
                $age,
                $adresse
            );

            // Mettre à jour les informations de l'utilisateur dans la session
            $_SESSION['user']['last_name'] = $last_name;
            $_SESSION['user']['first_name'] = $first_name;
            $_SESSION['user']['email'] = $email;
            $_SESSION['user']['age'] = $age;
            $_SESSION['user']['address'] = $adresse;
            $_SESSION['user']['phone_number'] = $phone_number;

            // Redirection vers la page de compte
            header('Location: /compte');
        }
        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ .'/../Views/compte/modifier-profil.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }

}