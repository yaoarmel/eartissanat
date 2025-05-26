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
            WHERE a.id = :id
        ');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAuthorByUserId($userId)
    {
        $stmt = $this->db->prepare('SELECT * FROM authors WHERE user_id = :user_id');
        $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createAuthor($data)
    {
        $stmt = $this->db->prepare('
            INSERT INTO authors (user_id, bio, website, social_media_links, key_words, photo_url) 
            VALUES (:user_id, :bio, :website, :social_media_links, :key_words, :photo_url)
        ');
        return $stmt->execute([
            ':user_id' => $data['user_id'],
            ':bio' => $data['bio'] ?? null,
            ':website' => $data['website'] ?? null,
            ':social_media_links' => $data['social_media_links'] ? json_encode($data['social_media_links']) : null,
            ':key_words' => $data['key_words'] ?? null,
            ':photo_url' => $data['photo_url'] ?? ''
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
        $stmt = $this->db->prepare('UPDATE authors SET is_verified = 1 WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getTotalVerifiedAuthors()
    {
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM authors WHERE is_verified = 1');
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getPendingVerificationsCount()
    {
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM authors WHERE is_verified = 0');
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getAuthorsWithDetails($status = 'all', $page = 1, $perPage = 10)
    {
        $offset = ($page - 1) * $perPage;
        $where = '';
        
        if ($status === 'pending') {
            $where = 'WHERE a.is_verified = 0';
        } elseif ($status === 'verified') {
            $where = 'WHERE a.is_verified = 1';
        }

        $sql = "
            SELECT a.*, u.first_name, u.last_name, u.email
            FROM authors a
            JOIN users u ON a.user_id = u.id
            $where
            ORDER BY a.created_at DESC
            LIMIT ? OFFSET ?
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$perPage, $offset]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalAuthors($status = 'all')
    {
        $where = '';
        if ($status === 'pending') {
            $where = 'WHERE is_verified = 0';
        } elseif ($status === 'verified') {
            $where = 'WHERE is_verified = 1';
        }

        $sql = "SELECT COUNT(*) FROM authors $where";
        $stmt = $this->db->query($sql);
        return $stmt->fetchColumn();
    }
} 