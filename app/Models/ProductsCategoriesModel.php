<?php

namespace App\Models;
use Core\Database;
use PDO;

class ProductsCategoriesModel
{

    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    // Get all categories
    public function getAllproducts_categories(): array
    {
        $sql = "SELECT * FROM products_categories";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}