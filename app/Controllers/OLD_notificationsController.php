<?php

namespace App\Controllers;

class notificationsController
{
    public function notifier(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ .'/../Views/notifications.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }
}