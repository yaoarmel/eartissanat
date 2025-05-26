<?php

namespace App\Controllers;

class paiementController
{
    public function payer(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ .'/../Views/paiement.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }
}