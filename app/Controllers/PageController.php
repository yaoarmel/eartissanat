<?php

namespace App\Controllers;

class PageController
{
    public function privacy()
    {
        $title = 'Politique de confidentialité';
        \App\Core\View::render('pages/privacy', [
            'title' => $title
        ]);
    }

    public function refund()
    {
        $title = 'Politique de remboursement';
        \App\Core\View::render('pages/refund', [
            'title' => $title
        ]);
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

        \App\Core\View::render('pages/contact', [
            'title' => $title
        ]);
    }
} 