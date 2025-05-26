<?php

namespace App\Middleware;

use Core\Session;

class AuthMiddleware
{
    public static function isAuthenticated()
    {
        if (!Session::isLoggedIn()) {
            header('Location: /login');
            exit;
        }
    }

    public static function isGuest()
    {
        if (Session::isLoggedIn()) {
            header('Location: /');
            exit;
        }
    }
} 