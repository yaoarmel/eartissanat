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
        $title = 'Mon panier';
        $cart = Session::get('cart', []);
        $total = 0;
        $products = [];

        if (!empty($cart)) {
            foreach ($cart as $productId => $quantity) {
                $product = $this->productModel->getProductById($productId);
                if ($product) {
                    $products[] = [
                        'product' => $product,
                        'quantity' => $quantity
                    ];
                    $total += $product['price'] * $quantity;
                }
            }
        }

        \App\Core\View::render('cart/index', [
            'title' => $title,
            'products' => $products,
            'total' => $total
        ]);
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

    public function checkout()
    {
        AuthMiddleware::isAuthenticated();
        $title = 'Finaliser la commande';
        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            header('Location: /cart');
            exit;
        }

        $total = 0;
        $products = [];
        foreach ($cart as $productId => $quantity) {
            $product = $this->productModel->getProductById($productId);
            if ($product) {
                $products[] = [
                    'product' => $product,
                    'quantity' => $quantity
                ];
                $total += $product['price'] * $quantity;
            }
        }

        $user = $this->userModel->getUserById(Session::getUserId());

        \App\Core\View::render('cart/checkout', [
            'title' => $title,
            'products' => $products,
            'total' => $total,
            'user' => $user
        ]);
    }
} 