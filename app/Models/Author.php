<?php

namespace App\Models;

use Core\Database;
use PDO;

class Author
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAuthorById($id)
    {
        $stmt = $this->db->prepare('
            SELECT a.*, u.first_name, u.last_name, u.email, u.phone_number 
            FROM authors a
            JOIN users u ON a.user_id = u.id
            WHERE a.id = ?
        ');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAuthorByUserId($userId)
    {
        $stmt = $this->db->prepare('SELECT * FROM authors WHERE user_id = ?');
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createAuthor($data)
    {
        $stmt = $this->db->prepare('
            INSERT INTO authors (user_id, bio, website, social_media_links, key_words, photo_url) 
            VALUES (?, ?, ?, ?, ?, ?)
        ');
        return $stmt->execute([
            $data['user_id'],
            $data['bio'] ?? null,
            $data['website'] ?? null,
            $data['social_media_links'] ? json_encode($data['social_media_links']) : null,
            $data['key_words'] ?? null,
            $data['photo_url'] ?? ''
        ]);
    }

    public function updateAuthor($id, $data)
    {
        $updates = [];
        $params = [];

        if (isset($data['bio'])) {
            $updates[] = 'bio = ?';
            $params[] = $data['bio'];
        }
        if (isset($data['website'])) {
            $updates[] = 'website = ?';
            $params[] = $data['website'];
        }
        if (isset($data['social_media_links'])) {
            $updates[] = 'social_media_links = ?';
            $params[] = json_encode($data['social_media_links']);
        }
        if (isset($data['key_words'])) {
            $updates[] = 'key_words = ?';
            $params[] = $data['key_words'];
        }
        if (isset($data['is_verified'])) {
            $updates[] = 'is_verified = ?';
            $params[] = $data['is_verified'];
        }
        if (isset($data['photo_url'])) {
            $updates[] = 'photo_url = ?';
            $params[] = $data['photo_url'];
        }

        if (empty($updates)) {
            return false;
        }

        $params[] = $id;
        $sql = 'UPDATE authors SET ' . implode(', ', $updates) . ' WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    public function getAllVerifiedAuthors()
    {
        $stmt = $this->db->prepare('
            SELECT a.*, u.first_name, u.last_name 
            FROM authors a
            JOIN users u ON a.user_id = u.id
            WHERE a.is_verified = 1
            ORDER BY a.created_at DESC
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function verifyAuthor($id)
    {
        $stmt = $this->db->prepare('UPDATE authors SET is_verified = 1 WHERE id = ?');
        return $stmt->execute([$id]);
    }
} 