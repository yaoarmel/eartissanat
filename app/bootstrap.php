<?php

// Démarrer la session si elle n'est pas déjà démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Charger les fonctions helpers
require_once __DIR__ . '/helpers.php';

// Autoloader pour les classes
spl_autoload_register(function ($class) {
    // Convertir le namespace en chemin de fichier
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

// Rendre la classe View disponible globalement
use App\Core\View;

// Fonction helper pour l'échappement HTML
if (!function_exists('e')) {
    function e($value) {
        return View::escape($value);
    }
}

// Fonction helper pour le rendu des vues partielles
if (!function_exists('partial')) {
    function partial($name, $data = []) {
        View::partial($name, $data);
    }
} 