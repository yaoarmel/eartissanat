<?php

// Définir le chemin de base
define('BASE_PATH', dirname(__DIR__));

// Afficher les erreurs en développement
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Charger l'autoloader Composer
if (file_exists(BASE_PATH . '/vendor/autoload.php')) {
    require_once BASE_PATH . '/vendor/autoload.php';
}

// Charger les fonctions core
require_once BASE_PATH . '/core/functions.php';

// Charger les dépendances core
require_once BASE_PATH . '/core/Database.php';
require_once BASE_PATH . '/core/Router.php';
require_once BASE_PATH . '/core/bootstrap.php';

try {
    // Démarrer l'application
    $router = new Core\Router();
    
    // Charger les routes
    require_once BASE_PATH . '/routes/web.php';
    
    // Dispatcher les requêtes
    $router->dispatch();
} catch (Exception $e) {
    // Log l'erreur
    error_log($e->getMessage());
    // Afficher une page d'erreur
    http_response_code(500);
    include BASE_PATH . '/app/Views/errors/500.php';
}

