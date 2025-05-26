<?php

namespace App\Controllers;

class TestController
{
    public function index(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ .'/../Views/test/test.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }
}