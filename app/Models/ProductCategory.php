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
        $stmt = $this->db->prepare('SELECT * FROM products_categories WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getCategoryBySlug($slug)
    {
        $stmt = $this->db->prepare('SELECT * FROM products_categories WHERE LOWER(REPLACE(name, " ", "-")) = ?');
        $stmt->execute([$slug]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createCategory($data)
    {
        $stmt = $this->db->prepare('
            INSERT INTO products_categories (name, description, img_url)
            VALUES (?, ?, ?)
        ');
        return $stmt->execute([
            $data['name'],
            $data['description'] ?? null,
            $data['img_url'] ?? null
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
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM products WHERE category_id = ?');
        $stmt->execute([$categoryId]);
        return $stmt->fetchColumn();
    }
} 