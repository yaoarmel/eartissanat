<?php

namespace App\Controllers;

use App\Models\Order;
use App\Models\Cart;
use Core\Session;
use App\Middleware\AuthMiddleware;

class OrderController
{
    private Order $orderModel;
    private Cart $cartModel;

    public function __construct()
    {
        $this->orderModel = new Order();
        $this->cartModel = new Cart();
    }

    public function index()
    {
        AuthMiddleware::isAuthenticated();
        $userId = Session::getUserId();
        
        $title = 'Mes commandes';
        $orders = $this->orderModel->getUserOrders($userId);
        
        require_once __DIR__ . '/../Views/orders/index.php';
    }

    public function show($id)
    {
        AuthMiddleware::isAuthenticated();
        $userId = Session::getUserId();
        
        $order = $this->orderModel->getOrderById($id);
        
        if (!$order || $order['user_id'] != $userId) {
            header('Location: /orders');
            exit;
        }

        $title = 'Commande #' . $id;
        require_once __DIR__ . '/../Views/orders/show.php';
    }

    public function create()
    {
        AuthMiddleware::isAuthenticated();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /cart');
            exit;
        }

        $userId = Session::getUserId();
        
        // Récupérer les articles du panier
        $cartItems = $this->cartModel->getCartItems($userId);
        
        // Créer une commande pour chaque article
        foreach ($cartItems as $item) {
            $this->orderModel->createOrder(
                $userId,
                $item['product_id'],
                $item['quantity']
            );
        }

        // Vider le panier
        $this->cartModel->clearCart($userId);

        header('Location: /orders');
        exit;
    }

    public function checkout()
    {
        AuthMiddleware::isAuthenticated();
        $userId = Session::getUserId();
        
        $title = 'Paiement';
        $cartItems = $this->cartModel->getCartItems($userId);
        $total = $this->cartModel->getCartTotal($userId);
        
        if (empty($cartItems)) {
            header('Location: /cart');
            exit;
        }

        require_once __DIR__ . '/../Views/orders/checkout.php';
    }
} 