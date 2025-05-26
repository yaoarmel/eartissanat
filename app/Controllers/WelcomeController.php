<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Author;
use App\Models\User;
use App\Core\View;
use Core\Database;

class WelcomeController
{
    private Product $productModel;
    private ProductCategory $categoryModel;
    private Author $authorModel;
    private User $userModel;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->categoryModel = new ProductCategory();
        $this->authorModel = new Author();
        $this->userModel = new User();
    }

    public function index()
    {
        // Préparer les données pour la vue
        $data = [
            'title' => 'Accueil - EArtisanat',
            'stats' => [
                'total_artisans' => $this->authorModel->getTotalVerifiedAuthors(),
                'total_products' => $this->productModel->getTotalProducts(),
                'total_categories' => $this->categoryModel->getTotalCategories()
            ]
        ];

        // Récupérer les catégories avec le nombre de produits
        $categories = $this->categoryModel->getAllCategories();
        foreach ($categories as &$category) {
            $category['product_count'] = $this->productModel->getProductCountByCategory($category['id']);
        }
        $data['categories'] = $categories;

        // Récupérer les produits en vedette
        $featured_products = $this->productModel->getFeaturedProducts(8);
        foreach ($featured_products as &$product) {
            $author = $this->authorModel->getAuthorById($product['author_id']);
            $product['author_is_verified'] = $author['is_verified'];
        }
        $data['featured_products'] = $featured_products;

        // Rendre la vue avec le layout de base
        View::render('welcome', $data);
    }

    public function newsletter()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /');
            exit;
        }

        $email = $_POST['email'] ?? '';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "L'adresse email n'est pas valide";
            header('Location: /');
            exit;
        }

        // Ajouter l'email à la newsletter (à implémenter selon votre système)
        // ...

        $_SESSION['success'] = "Merci de votre inscription à notre newsletter !";
        header('Location: /');
        exit;
    }
}