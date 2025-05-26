<?php

namespace App\Models;

use Core\Database;
use PDO;

class Newsletter
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function subscribe($email)
    {
        // Vérifier si l'email existe déjà
        $stmt = $this->db->prepare('SELECT id FROM newsletter_subscribers WHERE email = ?');
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            return false;
        }

        // Ajouter l'email
        $stmt = $this->db->prepare('INSERT INTO newsletter_subscribers (email, created_at) VALUES (?, NOW())');
        return $stmt->execute([$email]);
    }

    public function unsubscribe($email)
    {
        $stmt = $this->db->prepare('DELETE FROM newsletter_subscribers WHERE email = ?');
        return $stmt->execute([$email]);
    }

    public function isSubscribed($email)
    {
        $stmt = $this->db->prepare('SELECT id FROM newsletter_subscribers WHERE email = ?');
        $stmt->execute([$email]);
        return (bool) $stmt->fetch();
    }
} 