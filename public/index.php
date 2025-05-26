<?php

// Définir le chemin de base
define('BASE_PATH', dirname(__DIR__));

// Afficher les erreurs en développement
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Démarrer la session
session_start();

// Charger l'autoloader
spl_autoload_register(function ($class) {
    $file = BASE_PATH . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

// Charger les fonctions core
require_once BASE_PATH . '/core/functions.php';

// Charger les dépendances core
require_once BASE_PATH . '/core/Database.php';
require_once BASE_PATH . '/core/Router.php';
require_once BASE_PATH . '/core/bootstrap.php';

// Créer le routeur
$router = new Core\Router();

// Définir les routes
require_once BASE_PATH . '/routes/web.php';

// Gérer la requête
try {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    echo $router->dispatch($uri);
} catch (Exception $e) {
    // Log l'erreur
    error_log($e->getMessage());
    
    // Afficher une page d'erreur
    if (!headers_sent()) {
        http_response_code(500);
    }
    
    \App\Core\View::render('errors/500', [
        'title' => 'Erreur serveur - E-Artisanat',
        'error' => $e->getMessage()
    ]);
}

