<?php

namespace App\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Core\Session;
use App\Middleware\AuthMiddleware;

class CartController
{
    private Cart $cartModel;
    private Product $productModel;

    public function __construct()
    {
        $this->cartModel = new Cart();
        $this->productModel = new Product();
    }

    public function index()
    {
        AuthMiddleware::isAuthenticated();
        $userId = Session::getUserId();
        
        $title = 'Mon panier';
        $cartItems = $this->cartModel->getCartItems($userId);
        $total = $this->cartModel->getCartTotal($userId);
        
        require_once __DIR__ . '/../Views/cart/index.php';
    }

    public function add()
    {
        AuthMiddleware::isAuthenticated();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /cart');
            exit;
        }

        $userId = Session::getUserId();
        $productId = $_POST['product_id'] ?? null;
        $quantity = (int)($_POST['quantity'] ?? 1);

        if ($productId && $quantity > 0) {
            $this->cartModel->addToCart($userId, $productId, $quantity);
        }

        header('Location: /cart');
        exit;
    }

    public function update()
    {
        AuthMiddleware::isAuthenticated();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /cart');
            exit;
        }

        $userId = Session::getUserId();
        $productId = $_POST['product_id'] ?? null;
        $quantity = (int)($_POST['quantity'] ?? 0);

        if ($productId) {
            if ($quantity > 0) {
                $this->cartModel->updateQuantity($userId, $productId, $quantity);
            } else {
                $this->cartModel->removeFromCart($userId, $productId);
            }
        }

        header('Location: /cart');
        exit;
    }

    public function remove()
    {
        AuthMiddleware::isAuthenticated();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /cart');
            exit;
        }

        $userId = Session::getUserId();
        $productId = $_POST['product_id'] ?? null;

        if ($productId) {
            $this->cartModel->removeFromCart($userId, $productId);
        }

        header('Location: /cart');
        exit;
    }

    public function clear()
    {
        AuthMiddleware::isAuthenticated();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /cart');
            exit;
        }

        $userId = Session::getUserId();
        $this->cartModel->clearCart($userId);

        header('Location: /cart');
        exit;
    }
} 