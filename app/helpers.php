<?php

use App\Core\View;

/**
 * Formate un prix en euros
 * 
 * @param float $price Le prix à formater
 * @return string Le prix formaté
 */
function format_price($price) {
    return number_format($price, 2, ',', ' ') . ' €';
}

/**
 * Vérifie si l'utilisateur est connecté
 * 
 * @return bool
 */
function is_logged_in() {
    return isset($_SESSION['user']);
}

/**
 * Vérifie si l'utilisateur est un admin
 * 
 * @return bool
 */
function is_admin() {
    return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin';
}

/**
 * Vérifie si l'utilisateur est un artisan
 * 
 * @return bool
 */
function is_author() {
    return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'author';
}

/**
 * Redirige vers une URL
 * 
 * @param string $path Le chemin de redirection
 * @return void
 */
function redirect($path) {
    header('Location: ' . url($path));
    exit;
}

/**
 * Ajoute un message flash
 * 
 * @param string $type Le type de message (success, error, warning, info)
 * @param string $message Le message
 * @return void
 */
function flash($type, $message) {
    $_SESSION[$type] = $message;
}

if (!function_exists('e')) {
    /**
     * Échappe une chaîne de caractères pour l'affichage HTML
     * 
     * @param mixed $value La valeur à échapper
     * @return string La valeur échappée
     */
    function e($value) {
        return View::escape($value);
    }
}

if (!function_exists('partial')) {
    /**
     * Rend une vue partielle
     * 
     * @param string $name Le nom de la vue partielle
     * @param array $data Les données à passer à la vue
     * @return void
     */
    function partial($name, $data = []) {
        View::partial($name, $data);
    }
}

if (!function_exists('view')) {
    /**
     * Rend une vue complète
     * 
     * @param string $view Le nom de la vue
     * @param array $data Les données à passer à la vue
     * @param string $layout Le layout à utiliser
     * @return void
     */
    function view($view, $data = [], $layout = 'base') {
        View::render($view, $data, $layout);
    }
}

if (!function_exists('asset')) {
    /**
     * Génère une URL pour un asset
     * 
     * @param string $path Le chemin de l'asset
     * @return string L'URL complète de l'asset
     */
    function asset($path) {
        return '/assets/' . ltrim($path, '/');
    }
}

if (!function_exists('url')) {
    /**
     * Génère une URL pour une route
     * 
     * @param string $path Le chemin de la route
     * @return string L'URL complète
     */
    function url($path = '') {
        return '/' . ltrim($path, '/');
    }
} 