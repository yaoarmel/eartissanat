<?php

namespace App\Controllers;

class PanierController
{
    public function panier(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ .'/../Views/panier.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }
}