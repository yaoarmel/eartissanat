<?php

namespace App\Controllers;

use App\Models\AuthorModel;
use App\Models\ProductsCategoriesModel;
use App\Models\ProductsModel;

class AuthorController
{
    public function author_view_guest(string $title)
    {
        session_start();
        if (isset($_GET['id'])) {
            $autorId = $_GET['id'];
            $authorModel = new AuthorModel();
            $user = $authorModel->get_user_by_id($autorId);
            
            $author = $authorModel->get_author_by_id($autorId);
        
            $keywords = $author['key_words'];
            // Convert string(17) "{Bijoux,Qualité}" to array ['Bijoux', 'Qualité']
            $keywords = trim($keywords, '{}');
            $keywordsArray = array_map('trim', explode(',', $keywords));
            

            $productsModel = new ProductsModel();
            $products = $productsModel->get($_GET['id']);
        }
        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ . '/../Views/authors/author_view_guest.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }

    public function author_dashboard_view(string $title)
    {
        session_start();
        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ . '/../Views/authors/author_layouts/author_sidebar_part.php';
        require_once __DIR__ . '/../Views/authors/author_dashboard_view.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }

// products
    public function author_products_view(string $title)
    {
        session_start();
        $productsModel = new ProductsModel();
        $products = $productsModel->getAllProductsAndCategoriesByAuthorId($_SESSION['user']['id']);

        if (isset($_GET['delete'])) {
            
            $productsModel->deleteProductById($_GET['delete']);
            header('Location: /author/products');
            exit;
        }
        
        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ . '/../Views/authors/author_layouts/author_sidebar_part.php';
        require_once __DIR__ . '/../Views/authors/products/author_products_view.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }

    public function author_edit_product_view(string $title)
    {
        session_start();
        $categoriesModel = new ProductsCategoriesModel();
        $categories = $categoriesModel->getAllproducts_categories();

        $productsModel = new ProductsModel();

        if (isset($_POST) && !empty($_POST)) {
            $data = [
                'id' => $_GET['id'],
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'stock' => $_POST['stock'],
                'category_id' => $_POST['category_id'],
            ];
           
            $productsModel->editProductById($_GET['id'], $data);
            header('Location: /author/products');
            exit;
        }

        
        $product = $productsModel->getProductById($_GET['id']);
        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ . '/../Views/authors/author_layouts/author_sidebar_part.php';
        require_once __DIR__ . '/../Views/authors/products/author_edit_products_view.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }

    public function author_add_product_view(string $title)
    {
        session_start();
        $categoriesModel = new ProductsCategoriesModel();
        $categories = $categoriesModel->getAllproducts_categories();

        $productsModel = new ProductsModel();

        if (isset($_POST) && !empty($_POST)) {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'stock' => $_POST['stock'],
                'category_id' => $_POST['category_id'],
            ];
           
            header('Location: /author/products');
            exit;
        }

        
        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ . '/../Views/authors/author_layouts/author_sidebar_part.php';
        require_once __DIR__ . '/../Views/authors/products/author_add_products_view.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }


    





    public function author_orders_view(string $title)
    {
        session_start();
        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ . '/../Views/authors/author_layouts/author_sidebar_part.php';
        require_once __DIR__ . '/../Views/authors/orders/author_orders_view.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }
    public function author_settings_view(string $title)
    {
        session_start();
        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ . '/../Views/authors/author_layouts/author_sidebar_part.php';
        require_once __DIR__ . '/../Views/authors/settings/author_settings_view.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }

    public function author_uploads_view(string $title)
    {
        session_start();
        $uploadedFileUrl = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photos'])) {
            $uploadDir = __DIR__ . '/../../../public/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $files = $_FILES['photos'];
            $uploadedFiles = [];
            for ($i = 0; $i < count($files['name']); $i++) {
                if ($files['error'][$i] === UPLOAD_ERR_OK) {
                    $tmpName = $files['tmp_name'][$i];
                    $fileName = basename($files['name'][$i]);
                    $targetPath = $uploadDir . $fileName;
                    if (move_uploaded_file($tmpName, $targetPath)) {
                        $uploadedFiles[] = '/uploads/' . $fileName;
                    }
                }
            }
            if (!empty($uploadedFiles)) {
                $uploadedFileUrl = $uploadedFiles; // tableau des URLs uploadées
                var_dump($uploadedFiles);
                
            }
            exit;

        }
        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ . '/../Views/authors/author_layouts/author_sidebar_part.php';
        require_once __DIR__ . '/../Views/authors/products/author_uploads_view.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }

}