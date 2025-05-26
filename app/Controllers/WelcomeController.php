<?php

namespace App\Controllers;

use App\Models\ProductCategory;
use Core\Database;

class WelcomeController
{
    public function index()
    {
        // Récupérer les données nécessaires depuis le modèle
        $title = 'E-Artisanat - Accueil';
        
        // Récupérer les catégories de produits
        $db = Database::getInstance();
        $stmt = $db->query('SELECT * FROM products_categories ORDER BY name');
        $categories = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        // Ajouter le slug pour chaque catégorie
        foreach ($categories as &$category) {
            $category['slug'] = strtolower(str_replace(' ', '-', $category['name']));
        }
        
        // Charger la vue avec les données
        require_once __DIR__ . '/../Views/welcome.php';
    }

    public function welcome_view(string $title)
    {
        session_start();

        $products_categories = new ProductsCategoriesModel();
        $categories = $products_categories->getAllproducts_categories();
        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ .'/../Views/welcome_view.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }
}