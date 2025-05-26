<?php

namespace App\Controllers;
use App\Models\ProductsCategoriesModel;

class WelcomeController
{
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