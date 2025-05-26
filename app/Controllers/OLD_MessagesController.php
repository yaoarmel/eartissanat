<?php

namespace App\Controllers;

class MessagesController
{
    public function messages_view(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ .'/../Views/messages/messages_view.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }

    public function message_view(string $title)
    {
        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ .'/../Views/messages/message_view.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }

}