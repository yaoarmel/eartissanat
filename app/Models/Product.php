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
            WHERE p.id = :id
        ');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
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
            $sql .= ' LIMIT :limit OFFSET :offset';
        }

        $stmt = $this->db->prepare($sql);
        
        if ($limit !== null) {
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        }
        
        $stmt->execute();
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
            WHERE p.category_id = :category_id
            ORDER BY p.created_at DESC
        ';

        if ($limit !== null) {
            $sql .= ' LIMIT :limit OFFSET :offset';
        }

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':category_id', $categoryId, PDO::PARAM_INT);
        
        if ($limit !== null) {
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        }
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductsByAuthor($authorId)
    {
        $stmt = $this->db->prepare('
            SELECT p.*, c.name as category_name
            FROM products p
            JOIN products_categories c ON p.category_id = c.id
            WHERE p.author_id = :author_id
            ORDER BY p.created_at DESC
        ');
        $stmt->bindValue(':author_id', $authorId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createProduct($data)
    {
        $stmt = $this->db->prepare('
            INSERT INTO products (name, description, price, stock, category_id, img_url, 
                                dimensions, origin, author_id, material)
            VALUES (:name, :description, :price, :stock, :category_id, :img_url, 
                    :dimensions, :origin, :author_id, :material)
        ');
        
        return $stmt->execute([
            ':name' => $data['name'],
            ':description' => $data['description'],
            ':price' => $data['price'],
            ':stock' => $data['stock'] ?? null,
            ':category_id' => $data['category_id'],
            ':img_url' => $data['img_url'],
            ':dimensions' => $data['dimensions'] ?? 'N/A',
            ':origin' => $data['origin'] ?? 'N/A',
            ':author_id' => $data['author_id'],
            ':material' => $data['material'] ?? 'N/A'
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
            SET stock = stock - :quantity 
            WHERE id = :id AND (stock - :quantity) >= 0
        ');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getFeaturedProducts($limit = 8)
    {
        $sql = '
            SELECT p.*, c.name as category_name, a.user_id as author_user_id,
                   u.first_name as author_first_name, u.last_name as author_last_name
            FROM products p
            JOIN products_categories c ON p.category_id = c.id
            JOIN authors a ON p.author_id = a.id
            JOIN users u ON a.user_id = u.id
            WHERE a.is_verified = 1
            ORDER BY p.created_at DESC
            LIMIT :limit
        ';
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductCountByCategory($categoryId)
    {
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM products WHERE category_id = :category_id');
        $stmt->bindValue(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getTotalProductsByCategory($categoryId)
    {
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM products WHERE category_id = :category_id');
        $stmt->bindValue(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getTotalProducts()
    {
        $stmt = $this->db->query('SELECT COUNT(*) FROM products');
        return $stmt->fetchColumn();
    }
} 