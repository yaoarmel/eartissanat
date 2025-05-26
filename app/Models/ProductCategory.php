<?php

namespace App\Models;

use Core\Database;
use PDO;

class ProductCategory
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAllCategories()
    {
        $stmt = $this->db->query('SELECT * FROM products_categories ORDER BY name');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoryById($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM products_categories WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getCategoryBySlug($slug)
    {
        $stmt = $this->db->prepare('SELECT * FROM products_categories WHERE LOWER(REPLACE(name, " ", "-")) = :slug');
        $stmt->bindValue(':slug', $slug, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createCategory($data)
    {
        $stmt = $this->db->prepare('
            INSERT INTO products_categories (name, description, img_url)
            VALUES (:name, :description, :img_url)
        ');
        return $stmt->execute([
            ':name' => $data['name'],
            ':description' => $data['description'] ?? null,
            ':img_url' => $data['img_url'] ?? null
        ]);
    }

    public function updateCategory($id, $data)
    {
        $updates = [];
        $params = [];

        if (isset($data['name'])) {
            $updates[] = 'name = ?';
            $params[] = $data['name'];
        }
        if (isset($data['description'])) {
            $updates[] = 'description = ?';
            $params[] = $data['description'];
        }
        if (isset($data['img_url'])) {
            $updates[] = 'img_url = ?';
            $params[] = $data['img_url'];
        }

        if (empty($updates)) {
            return false;
        }

        $params[] = $id;
        $sql = 'UPDATE products_categories SET ' . implode(', ', $updates) . ' WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    public function deleteCategory($id)
    {
        // Vérifier d'abord s'il y a des produits dans cette catégorie
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM products WHERE category_id = ?');
        $stmt->execute([$id]);
        if ($stmt->fetchColumn() > 0) {
            return false;
        }

        $stmt = $this->db->prepare('DELETE FROM products_categories WHERE id = ?');
        return $stmt->execute([$id]);
    }

    public function getProductCount($categoryId)
    {
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM products WHERE category_id = :category_id');
        $stmt->bindValue(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getTotalCategories()
    {
        $stmt = $this->db->query('SELECT COUNT(*) FROM products_categories');
        return $stmt->fetchColumn();
    }

    public function getCategoriesWithProductCount()
    {
        $sql = '
            SELECT c.*, COUNT(p.id) as product_count
            FROM products_categories c
            LEFT JOIN products p ON c.id = p.category_id
            GROUP BY c.id
            ORDER BY c.name
        ';
        
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} 