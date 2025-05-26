<?php

namespace App\Models;

use Core\Database;
use PDO;

class Product
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getProductById($id)
    {
        $stmt = $this->db->prepare('
            SELECT p.*, c.name as category_name, a.user_id as author_user_id,
                   u.first_name as author_first_name, u.last_name as author_last_name
            FROM products p
            JOIN products_categories c ON p.category_id = c.id
            JOIN authors a ON p.author_id = a.id
            JOIN users u ON a.user_id = u.id
            WHERE p.id = ?
        ');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllProducts($limit = null, $offset = 0)
    {
        $sql = '
            SELECT p.*, c.name as category_name, a.user_id as author_user_id,
                   u.first_name as author_first_name, u.last_name as author_last_name
            FROM products p
            JOIN products_categories c ON p.category_id = c.id
            JOIN authors a ON p.author_id = a.id
            JOIN users u ON a.user_id = u.id
            ORDER BY p.created_at DESC
        ';
        
        if ($limit !== null) {
            $sql .= ' LIMIT ? OFFSET ?';
        }

        $stmt = $this->db->prepare($sql);
        
        if ($limit !== null) {
            $stmt->execute([$limit, $offset]);
        } else {
            $stmt->execute();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductsByCategory($categoryId, $limit = null, $offset = 0)
    {
        $sql = '
            SELECT p.*, c.name as category_name, a.user_id as author_user_id,
                   u.first_name as author_first_name, u.last_name as author_last_name
            FROM products p
            JOIN products_categories c ON p.category_id = c.id
            JOIN authors a ON p.author_id = a.id
            JOIN users u ON a.user_id = u.id
            WHERE p.category_id = ?
            ORDER BY p.created_at DESC
        ';

        if ($limit !== null) {
            $sql .= ' LIMIT ? OFFSET ?';
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$categoryId, $limit, $offset]);
        } else {
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$categoryId]);
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductsByAuthor($authorId)
    {
        $stmt = $this->db->prepare('
            SELECT p.*, c.name as category_name
            FROM products p
            JOIN products_categories c ON p.category_id = c.id
            WHERE p.author_id = ?
            ORDER BY p.created_at DESC
        ');
        $stmt->execute([$authorId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createProduct($data)
    {
        $stmt = $this->db->prepare('
            INSERT INTO products (name, description, price, stock, category_id, img_url, 
                                dimensions, origin, author_id, material)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');
        return $stmt->execute([
            $data['name'],
            $data['description'],
            $data['price'],
            $data['stock'] ?? null,
            $data['category_id'],
            $data['img_url'],
            $data['dimensions'] ?? 'N/A',
            $data['origin'] ?? 'N/A',
            $data['author_id'],
            $data['material'] ?? 'N/A'
        ]);
    }

    public function updateProduct($id, $data)
    {
        $updates = [];
        $params = [];

        $possibleFields = [
            'name', 'description', 'price', 'stock', 'category_id', 'img_url',
            'dimensions', 'origin', 'material'
        ];

        foreach ($possibleFields as $field) {
            if (isset($data[$field])) {
                $updates[] = "$field = ?";
                $params[] = $data[$field];
            }
        }

        if (empty($updates)) {
            return false;
        }

        $params[] = $id;
        $sql = 'UPDATE products SET ' . implode(', ', $updates) . ' WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    public function deleteProduct($id)
    {
        $stmt = $this->db->prepare('DELETE FROM products WHERE id = ?');
        return $stmt->execute([$id]);
    }

    public function updateStock($id, $quantity)
    {
        $stmt = $this->db->prepare('
            UPDATE products 
            SET stock = stock - ? 
            WHERE id = ? AND (stock - ?) >= 0
        ');
        return $stmt->execute([$quantity, $id, $quantity]);
    }
} 