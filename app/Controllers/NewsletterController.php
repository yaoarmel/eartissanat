<?php

namespace App\Controllers;

use App\Models\Newsletter;

class NewsletterController
{
    private Newsletter $newsletterModel;

    public function __construct()
    {
        $this->newsletterModel = new Newsletter();
    }

    public function subscribe()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /');
            exit;
        }

        $email = $_POST['email'] ?? '';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['newsletter_error'] = "Adresse email invalide";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        if ($this->newsletterModel->subscribe($email)) {
            $_SESSION['newsletter_success'] = "Inscription à la newsletter réussie";
        } else {
            $_SESSION['newsletter_error'] = "Cette adresse email est déjà inscrite à la newsletter";
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function unsubscribe()
    {
        $email = $_GET['email'] ?? '';
        $token = $_GET['token'] ?? '';

        // TODO: Vérifier le token de désabonnement

        if ($this->newsletterModel->unsubscribe($email)) {
            $_SESSION['newsletter_success'] = "Désabonnement réussi";
        } else {
            $_SESSION['newsletter_error'] = "Une erreur est survenue lors du désabonnement";
        }

        header('Location: /');
        exit;
    }
} 