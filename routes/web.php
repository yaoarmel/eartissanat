<?php


global $router;

use App\Controllers\AuthController;
use App\Controllers\ProductsController;
use App\Controllers\PanierController;
use App\Controllers\paiementController;


use App\Controllers\AdminController;
use App\Controllers\CompteController;
use App\Controllers\TestController;
use App\Controllers\AuthorController;
use App\Controllers\ManageSessionController;
use App\Controllers\MessagesController;
use App\Controllers\OrdersController;
use App\Controllers\WelcomeController;

/**
 * Main Routes
 */

$router->get('/', function () {
    (new WelcomeController())->welcome_view(
        'E-Artisanat - Accueil'
    );
});


/**
 * Formular Routes
 */
$router->get('/login', function () {
    (new AuthController())->login_view(
        'E-Artisanat - Connexion'
    );
});

$router->post('/login', function () {
    (new AuthController())->login_view(
        'E-Artisanat - Connexion'
    );
});

$router->get('/register', function () {
    (new AuthController())->register_view(
        'E-Artisanat - Inscription'
    );
}); 

$router->post('/register', function () {
    (new AuthController())->register_view(
        'E-Artisanat - Inscription'
    );
}); 

/**
 * Messagerie Routes
 */
$router->get('/messages', function () {
    (new MessagesController())->messages_view(
        'E-Artisanat - Messagerie'
    );
});

$router->get('/message', function () {
    (new MessagesController())->message_view(
        'E-Artisanat - Messagerie'
    );
});

/**
 * Product Routes
 */
$router->get('/buy', function () {
    (new OrdersController())->buy_view(
        'E-Artisanat - Commande'
    );
});

$router->get('/products', function () {
    (new ProductsController())->products_view(
        'E-Artisanat - production'
    );
});

$router->get('/product', function () {
    (new ProductsController())->product_view(
        'E-Artisanat - commande & négociation'
    );
});

$router->get('/panier', function () {
    (new PanierController())->panier(
        'E-Artisanat - panier'
    );
});



$router->get('/payer', function () {
    (new paiementController())->payer(
        'E-Artisanat - paiement'
    );
});

/**
 * Admin Routes
 */
$router->get('/admin', function () {
    (new AdminController())->admin_dashboard_view(
        'E-Artisanat - Admin Dashboard'
    );
});

$router->get('/admin/users', function () {
    (new AdminController())->admin_users_view(
        'E-Artisanat - Admin Users'
    );
});

$router->get('/admin/products', function () {
    (new AdminController())->admin_products_view(
        'E-Artisanat - Admin Products'
    );
});

$router->get('/admin/orders', function () {
    (new AdminController())->admin_orders_view(
        'E-Artisanat - Admin Orders'
    );
});


$router->get('/admin/settings', function () {
    (new AdminController())->admin_settings_view(
        'E-Artisanat - Admin Settings'
    );
});

/**
 * User Routes
 */
$router->get('/compte', function () {
    (new CompteController())->compte(
        'E-Artisanat - compte'
    );
});

$router->get('/modifier-profil', function () {
    (new CompteController())->Modifier_profil(
        'E-Artisanat - Modifier Profil'
    );
});
$router->post('/modifier-profil', function () {
    (new CompteController())->Modifier_profil(
        'E-Artisanat - Modifier Profil'
    );
});

// Author Routes
$router->get('/author', function () {
    (new AuthorController())->author_view_guest(
        'E-Artisanat - Auteur'
    );
});

$router->get('/author/dashboard', function () {
    (new AuthorController())->author_dashboard_view(
        'E-Artisanat - Tableau de bord Auteur'
    );
});

$router->get('/author/products', function () {
    (new AuthorController())->author_products_view(
        'E-Artisanat - Produits Auteur'
    );
});

$router->get('/author/products/edit', function () {
    (new AuthorController())->author_edit_product_view(
        'E-Artisanat - Modifier Produit Auteur'
    );
});

$router->post('/author/products/edit', function () {
    (new AuthorController())->author_edit_product_view(
        'E-Artisanat - Modifier Produit Auteur'
    );
});

$router->get('/author/products/add', function () {
    (new AuthorController())->author_add_product_view(
        'E-Artisanat - Ajouter Produit Auteur'
    );
});

$router->post('/author/products/add', function () {
    (new AuthorController())->author_add_product_view(
        'E-Artisanat - Ajouter Produit Auteur'
    );
});

$router->get('/author/orders', function () {
    (new AuthorController())->author_orders_view(
        'E-Artisanat - Commandes Auteur'
    );
});
$router->get('/author/settings', function () {
    (new AuthorController())->author_settings_view(
        'E-Artisanat - Paramètres Auteur'
    );
});

$router->get('/author/galerie', function () {
    (new AuthorController())->author_uploads_view(
        'E-Artisanat - Galerie Auteur'
    );
});


$router->post('/author/galerie', function () {
    (new AuthorController())->author_uploads_view(
        'E-Artisanat - Galerie Auteur'
    );
});

$router->get('/test', function () {
    (new TestController())->index(
        'E-Artisanat - Test'
    );
});

// Manager Session Routes 
$router->get('/deconnexion', function () {
    (new ManageSessionController())->logout(
        'E-Artisanat - Deconnexion'
    );
});



