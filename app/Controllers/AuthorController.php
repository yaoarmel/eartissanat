<?php

namespace App\Controllers;

use App\Models\AuthorModel;
use App\Models\ProductsCategoriesModel;
use App\Models\ProductsModel;
use Core\Session;

class AuthorController
{
    private $authorModel;
    private $productsModel;
    private $categoriesModel;

    public function __construct()
    {
        $this->authorModel = new AuthorModel();
        $this->productsModel = new ProductsModel();
        $this->categoriesModel = new ProductsCategoriesModel();
    }

    public function profile($id = null)
    {
        $title = "Profil de l'artisan";
        
        if ($id) {
            $author = $this->authorModel->getAuthorById($id);
            if (!$author) {
                header('Location: /');
                exit;
            }
            $products = $this->productsModel->getProductsByAuthor($id);
        }
        
        \App\Core\View::render('authors/profile', [
            'title' => $title,
            'author' => $author ?? null,
            'products' => $products ?? []
        ]);
    }

    public function dashboard()
    {
        $this->checkAuthorAccess();
        $title = "Tableau de bord";
        
        $authorId = Session::get('author_id');
        $stats = [
            'total_products' => $this->productsModel->getAuthorProductsCount($authorId),
            'total_sales' => $this->productsModel->getAuthorSalesCount($authorId),
            'pending_orders' => $this->productsModel->getAuthorPendingOrdersCount($authorId)
        ];
        
        \App\Core\View::render('authors/dashboard', [
            'title' => $title,
            'stats' => $stats
        ]);
    }

    public function products()
    {
        $this->checkAuthorAccess();
        $title = "Mes produits";
        
        $authorId = Session::get('author_id');
        $products = $this->productsModel->getProductsByAuthor($authorId);
        
        \App\Core\View::render('authors/products', [
            'title' => $title,
            'products' => $products,
            'sidebar' => $this->render('authors/partials/sidebar')
        ]);
    }

    public function editProduct($id = null)
    {
        $this->checkAuthorAccess();
        $title = $id ? "Modifier le produit" : "Ajouter un produit";
        
        $authorId = Session::get('author_id');
        $categories = $this->categoriesModel->getAllproducts_categories();
        
        if ($id) {
            $product = $this->productsModel->getProductById($id);
            if (!$product || $product['author_id'] !== $authorId) {
                header('Location: /author/products');
                exit;
            }
        }
        
        \App\Core\View::render('authors/edit_product', [
            'title' => $title,
            'product' => $product ?? null,
            'categories' => $categories,
            'sidebar' => $this->render('authors/partials/sidebar')
        ]);
    }

    public function orders()
    {
        $this->checkAuthorAccess();
        $title = "Mes commandes";
        
        $authorId = Session::get('author_id');
        $orders = $this->productsModel->getAuthorOrders($authorId);
        
        \App\Core\View::render('authors/orders', [
            'title' => $title,
            'orders' => $orders,
            'sidebar' => $this->render('authors/partials/sidebar')
        ]);
    }

    public function settings()
    {
        $this->checkAuthorAccess();
        $title = "Paramètres";
        
        $authorId = Session::get('author_id');
        $author = $this->authorModel->getAuthorById($authorId);
        
        \App\Core\View::render('authors/settings', [
            'title' => $title,
            'author' => $author
        ]);
    }

    public function uploads()
    {
        $this->checkAuthorAccess();
        $title = "Gestion des médias";
        
        \App\Core\View::render('authors/uploads', [
            'title' => $title
        ]);
    }

    private function checkAuthorAccess()
    {
        if (!Session::get('author_id')) {
            header('Location: /login');
            exit;
        }
    }
}