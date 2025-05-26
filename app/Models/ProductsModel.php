<?php

namespace App\Models;
use Core\Database;
use PDO;

class ProductsModel
{

    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    // Get all products by category id
    public function getAllProductsByCategoryId(int $categoryId): array
    {
        $sql = "SELECT * FROM products WHERE category_id = :category_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // get product by id
    public function getProductById(int $id): array
    {
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // get authorNameAndIdByProductId
    public function getAuthorNameAndIdByProductId(int $productId): array
    {
        $sql = "SELECT u.id, u.first_name, u.last_name FROM users u INNER JOIN products p ON u.id = p.author_id WHERE p.id = :product_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // get all products by author id
    public function get(int $authorId): array
    {
        $sql = "SELECT * FROM products WHERE author_id = :author_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':author_id', $authorId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // get all products and categories by author id
    public function getAllProductsAndCategoriesByAuthorId(int $authorId): array
    {
        $sql = "SELECT p.id, p.name, p.price, p.stock, c.name AS category_name FROM products p INNER JOIN products_categories c ON p.category_id = c.id WHERE p.author_id = :author_id ORDER BY p.id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':author_id', $authorId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // edit product by id
    public function editProductById(int $id, array $data): bool
    {
        $sql = "UPDATE products SET name = :name, category_id = :category_id, price = :price, stock = :stock, description = :description WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':category_id', $data['category_id'], PDO::PARAM_INT);
        $stmt->bindParam(':price', $data['price'], PDO::PARAM_STR);
        $stmt->bindParam(':stock', $data['stock'], PDO::PARAM_INT);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // delete product by id
    public function deleteProductById(int $id): bool
    {
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

}