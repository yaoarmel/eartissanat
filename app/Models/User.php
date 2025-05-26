<?php

namespace App\Models;

use Core\Database;
use PDO;

class User
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getUserById($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserByEmail($email)
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($data)
    {
        $stmt = $this->db->prepare('INSERT INTO users (first_name, last_name, email, password_hash, phone_number, age, address, role) 
                                   VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        return $stmt->execute([
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            password_hash($data['password'], PASSWORD_DEFAULT),
            $data['phone_number'],
            $data['age'] ?? 0,
            $data['address'] ?? 'Non defini',
            $data['role'] ?? 'user'
        ]);
    }

    public function updateUser($id, $data)
    {
        $updates = [];
        $params = [];
        
        if (isset($data['first_name'])) {
            $updates[] = 'first_name = ?';
            $params[] = $data['first_name'];
        }
        if (isset($data['last_name'])) {
            $updates[] = 'last_name = ?';
            $params[] = $data['last_name'];
        }
        if (isset($data['email'])) {
            $updates[] = 'email = ?';
            $params[] = $data['email'];
        }
        if (isset($data['phone_number'])) {
            $updates[] = 'phone_number = ?';
            $params[] = $data['phone_number'];
        }
        if (isset($data['age'])) {
            $updates[] = 'age = ?';
            $params[] = $data['age'];
        }
        if (isset($data['address'])) {
            $updates[] = 'address = ?';
            $params[] = $data['address'];
        }
        if (isset($data['password'])) {
            $updates[] = 'password_hash = ?';
            $params[] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        if (isset($data['role'])) {
            $updates[] = 'role = ?';
            $params[] = $data['role'];
        }
        
        if (empty($updates)) {
            return false;
        }

        $params[] = $id;
        $sql = 'UPDATE users SET ' . implode(', ', $updates) . ' WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    public function verifyPassword($email, $password)
    {
        $user = $this->getUserByEmail($email);
        if (!$user) {
            return false;
        }
        return password_verify($password, $user['password_hash']);
    }

    public function isArtisan($userId)
    {
        $stmt = $this->db->prepare('SELECT role FROM users WHERE id = ?');
        $stmt->execute([$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user && $user['role'] === 'artisant';
    }
} 