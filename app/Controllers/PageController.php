<?php

namespace App\Controllers;

class PageController
{
    public function privacy()
    {
        $title = 'Politique de confidentialité';
        require_once __DIR__ . '/../Views/pages/privacy.php';
    }

    public function refund()
    {
        $title = 'Politique de remboursement';
        require_once __DIR__ . '/../Views/pages/refund.php';
    }

    public function contact()
    {
        $title = 'Contact';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $message = $_POST['message'] ?? '';

            if (empty($name) || empty($email) || empty($message)) {
                $_SESSION['contact_error'] = "Tous les champs sont obligatoires";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['contact_error'] = "Adresse email invalide";
            } else {
                // TODO: Envoyer l'email
                $_SESSION['contact_success'] = "Votre message a été envoyé avec succès";
                header('Location: /contact');
                exit;
            }
        }

        require_once __DIR__ . '/../Views/pages/contact.php';
    }
} 