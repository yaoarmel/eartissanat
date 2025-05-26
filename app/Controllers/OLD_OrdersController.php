<?php

namespace App\Controllers;

class OrdersController
{
    public function orders_view(string $title)
    {
        
        require_once __DIR__ . '/../Views/layouts/layouts_header.php';
        require_once __DIR__ .'/../Views/order_view.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer.php';
    }

    public function orders_detail_view(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/layouts_header.php';
        require_once __DIR__ .'/../Views/orders_detail_view.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer.php';
    }

    public function buy_view(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/layouts_header.php';
        require_once __DIR__ .'/../Views/buy_view.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer.php';
    }
}