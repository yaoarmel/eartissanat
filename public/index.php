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
    http_response_code(500);
    $title = 'Erreur serveur';
    $content = '<div class="min-h-[60vh] flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-6xl font-bold text-red-600 mb-4">500</h1>
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Erreur interne du serveur</h2>
            <p class="text-gray-600 mb-8">Une erreur inattendue s\'est produite. Notre équipe technique a été notifiée.</p>
            <a href="/" class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors">
                Retour à l\'accueil
            </a>
        </div>
    </div>';
    require BASE_PATH . '/app/Views/layouts/base.php';
}

