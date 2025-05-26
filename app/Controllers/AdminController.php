<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Author;
use App\Models\Product;
use Core\Session;
use App\Middleware\AuthMiddleware;

class AdminController
{
    private User $userModel;
    private Author $authorModel;
    private Product $productModel;

    public function __construct()
    {
        $this->userModel = new User();
        $this->authorModel = new Author();
        $this->productModel = new Product();
    }

    private function checkAdminAccess()
    {
        AuthMiddleware::isAuthenticated();
        $userId = Session::getUserId();
        $user = $this->userModel->getUserById($userId);
        
        if ($user['role'] !== 'admin') {
            header('Location: /');
            exit;
        }
    }

    public function dashboard()
    {
        $this->checkAdminAccess();
        $title = 'Tableau de bord administrateur';
        
        // Statistiques de base
        $stats = [
            'total_users' => $this->userModel->getTotalUsers(),
            'total_artisans' => $this->userModel->getTotalArtisans(),
            'pending_verifications' => $this->authorModel->getPendingVerificationsCount(),
            'total_products' => $this->productModel->getTotalProducts()
        ];
        
        \App\Core\View::render('admin/dashboard', [
            'title' => $title,
            'stats' => $stats
        ]);
    }

    public function authors()
    {
        $this->checkAdminAccess();
        $title = 'Gestion des artisans';
        
        $status = $_GET['status'] ?? 'all';
        $page = (int)($_GET['page'] ?? 1);
        $perPage = 10;
        
        $authors = $this->authorModel->getAuthorsWithDetails($status, $page, $perPage);
        $totalAuthors = $this->authorModel->getTotalAuthors($status);
        $totalPages = ceil($totalAuthors / $perPage);
        
        \App\Core\View::render('admin/authors', [
            'title' => $title,
            'authors' => $authors,
            'totalPages' => $totalPages,
            'currentPage' => $page,
            'status' => $status
        ]);
    }

    public function authorDetails($id)
    {
        $this->checkAdminAccess();
        
        $author = $this->authorModel->getAuthorById($id);
        if (!$author) {
            header('Location: /admin/authors');
            exit;
        }
        
        $user = $this->userModel->getUserById($author['user_id']);
        $products = $this->productModel->getProductsByAuthor($id);
        $title = "Profil de l'artisan : {$user['first_name']} {$user['last_name']}";
        
        \App\Core\View::render('admin/author-details', [
            'title' => $title,
            'author' => $author,
            'user' => $user,
            'products' => $products
        ]);
    }

    public function verifyAuthor()
    {
        $this->checkAdminAccess();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /admin/authors');
            exit;
        }

        $authorId = $_POST['author_id'] ?? null;
        $action = $_POST['action'] ?? null;

        if ($authorId && $action) {
            if ($action === 'verify') {
                $this->authorModel->verifyAuthor($authorId);
                $_SESSION['success'] = "L'artisan a été vérifié avec succès";
            } elseif ($action === 'reject') {
                $_SESSION['success'] = "L'artisan a été rejeté";
            }
        }

        header('Location: /admin/authors');
        exit;
    }

    public function products()
    {
        $this->checkAdminAccess();
        $title = 'Gestion des produits';
        
        $page = (int)($_GET['page'] ?? 1);
        $perPage = 10;
        
        $products = $this->productModel->getAllProducts($perPage, ($page - 1) * $perPage);
        $totalProducts = $this->productModel->getTotalProducts();
        $totalPages = ceil($totalProducts / $perPage);
        
        \App\Core\View::render('admin/products', [
            'title' => $title,
            'products' => $products,
            'totalPages' => $totalPages,
            'currentPage' => $page
        ]);
    }
}
