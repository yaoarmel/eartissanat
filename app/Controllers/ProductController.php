<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Author;
use App\Models\ProductCategory;
use Core\Session;

class ProductController
{
    private Product $productModel;
    private Author $authorModel;
    private ProductCategory $categoryModel;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->authorModel = new Author();
        $this->categoryModel = new ProductCategory();
    }

    public function index()
    {
        $title = 'Nos produits';
        $category_id = $_GET['category'] ?? null;
        $page = (int)($_GET['page'] ?? 1);
        $perPage = 12;

        if ($category_id) {
            $products = $this->productModel->getProductsByCategory($category_id, $perPage, ($page - 1) * $perPage);
            $totalProducts = $this->productModel->getTotalProductsByCategory($category_id);
            $category = $this->categoryModel->getCategoryById($category_id);
            $title = 'Produits - ' . $category['name'];
        } else {
            $products = $this->productModel->getAllProducts($perPage, ($page - 1) * $perPage);
            $totalProducts = $this->productModel->getTotalProducts();
        }

        $totalPages = ceil($totalProducts / $perPage);
        $categories = $this->categoryModel->getAllCategories();

        \App\Core\View::render('products/index', [
            'title' => $title,
            'products' => $products,
            'categories' => $categories,
            'totalPages' => $totalPages,
            'currentPage' => $page,
            'category' => $category ?? null
        ]);
    }

    public function show($id)
    {
        $product = $this->productModel->getProductById($id);
        if (!$product) {
            header('Location: /products');
            exit;
        }

        $author = $this->authorModel->getAuthorById($product['author_id']);
        $title = $product['name'];

        \App\Core\View::render('products/show', [
            'title' => $title,
            'product' => $product,
            'author' => $author
        ]);
    }

    public function create()
    {
        if (!Session::isAuthenticated() || !$this->authorModel->isVerified(Session::getUserId())) {
            header('Location: /login');
            exit;
        }

        $title = 'Ajouter un produit';
        $categories = $this->categoryModel->getAllCategories();
        $author = $this->authorModel->getAuthorByUserId(Session::getUserId());

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'] ?? '',
                'description' => $_POST['description'] ?? '',
                'price' => (float)($_POST['price'] ?? 0),
                'stock' => (int)($_POST['stock'] ?? 0),
                'category_id' => (int)($_POST['category_id'] ?? 0),
                'author_id' => $author['id'],
                'dimensions' => $_POST['dimensions'] ?? 'N/A',
                'origin' => $_POST['origin'] ?? 'N/A',
                'material' => $_POST['material'] ?? 'N/A'
            ];

            // Gestion de l'upload d'image
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'public/uploads/products/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $fileExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                $newFileName = uniqid() . '.' . $fileExtension;
                $targetPath = $uploadDir . $newFileName;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                    $data['img_url'] = '/' . $targetPath;
                } else {
                    $error = "Erreur lors de l'upload de l'image";
                }
            }

            if (empty($data['name']) || empty($data['description']) || $data['price'] <= 0) {
                $error = "Veuillez remplir tous les champs obligatoires";
            } elseif (!isset($error) && $this->productModel->createProduct($data)) {
                $_SESSION['success'] = "Le produit a été ajouté avec succès";
                header('Location: /products');
                exit;
            } else {
                $error = $error ?? "Une erreur est survenue lors de l'ajout du produit";
            }
        }

        require_once __DIR__ . '/../Views/products/create.php';
    }

    public function edit($id)
    {
        if (!Session::isAuthenticated()) {
            header('Location: /login');
            exit;
        }

        $product = $this->productModel->getProductById($id);
        if (!$product) {
            header('Location: /products');
            exit;
        }

        $author = $this->authorModel->getAuthorByUserId(Session::getUserId());
        if ($product['author_id'] !== $author['id'] && !Session::isAdmin()) {
            header('Location: /products');
            exit;
        }

        $title = 'Modifier le produit';
        $categories = $this->categoryModel->getAllCategories();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'] ?? $product['name'],
                'description' => $_POST['description'] ?? $product['description'],
                'price' => (float)($_POST['price'] ?? $product['price']),
                'stock' => (int)($_POST['stock'] ?? $product['stock']),
                'category_id' => (int)($_POST['category_id'] ?? $product['category_id']),
                'dimensions' => $_POST['dimensions'] ?? $product['dimensions'],
                'origin' => $_POST['origin'] ?? $product['origin'],
                'material' => $_POST['material'] ?? $product['material']
            ];

            // Gestion de l'upload d'image
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'public/uploads/products/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $fileExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                $newFileName = uniqid() . '.' . $fileExtension;
                $targetPath = $uploadDir . $newFileName;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                    $data['img_url'] = '/' . $targetPath;
                    
                    // Supprimer l'ancienne image si elle existe
                    if ($product['img_url'] && file_exists(ltrim($product['img_url'], '/'))) {
                        unlink(ltrim($product['img_url'], '/'));
                    }
                } else {
                    $error = "Erreur lors de l'upload de l'image";
                }
            }

            if (empty($data['name']) || empty($data['description']) || $data['price'] <= 0) {
                $error = "Veuillez remplir tous les champs obligatoires";
            } elseif (!isset($error) && $this->productModel->updateProduct($id, $data)) {
                $_SESSION['success'] = "Le produit a été modifié avec succès";
                header('Location: /products/' . $id);
                exit;
            } else {
                $error = $error ?? "Une erreur est survenue lors de la modification du produit";
            }
        }

        require_once __DIR__ . '/../Views/products/edit.php';
    }

    public function delete($id)
    {
        if (!Session::isAuthenticated()) {
            header('Location: /login');
            exit;
        }

        $product = $this->productModel->getProductById($id);
        if (!$product) {
            header('Location: /products');
            exit;
        }

        $author = $this->authorModel->getAuthorByUserId(Session::getUserId());
        if ($product['author_id'] !== $author['id'] && !Session::isAdmin()) {
            header('Location: /products');
            exit;
        }

        if ($this->productModel->deleteProduct($id)) {
            // Supprimer l'image si elle existe
            if ($product['img_url'] && file_exists(ltrim($product['img_url'], '/'))) {
                unlink(ltrim($product['img_url'], '/'));
            }
            $_SESSION['success'] = "Le produit a été supprimé avec succès";
        } else {
            $_SESSION['error'] = "Une erreur est survenue lors de la suppression du produit";
        }

        header('Location: /products');
        exit;
    }
} 