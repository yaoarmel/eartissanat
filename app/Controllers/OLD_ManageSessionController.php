<?php

namespace App\Controllers;


class ManageSessionController
{
    public function logout(string $title)
    {
        session_start();
        session_destroy();
        header('Location: /login');
        exit();
    }
}