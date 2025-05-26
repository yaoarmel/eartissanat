<?php

namespace App\Models;

use Core\Database;
use PDO;

class Cart
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getCartItems($userId)
    {
        $stmt = $this->db->prepare('SELECT c.*, p.name, p.price, p.img_url 
                                   FROM cart c
                                   LEFT JOIN products p ON c.product_id = p.id
                                   WHERE c.user_id = ?');
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addToCart($userId, $productId, $quantity = 1)
    {
        // Vérifier si le produit existe déjà dans le panier
        $stmt = $this->db->prepare('SELECT * FROM cart WHERE user_id = ? AND product_id = ?');
        $stmt->execute([$userId, $productId]);
        $existingItem = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingItem) {
            // Mettre à jour la quantité
            $stmt = $this->db->prepare('UPDATE cart SET quantity = quantity + ? WHERE user_id = ? AND product_id = ?');
            return $stmt->execute([$quantity, $userId, $productId]);
        } else {
            // Ajouter un nouveau produit
            $stmt = $this->db->prepare('INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)');
            return $stmt->execute([$userId, $productId, $quantity]);
        }
    }

    public function updateQuantity($userId, $productId, $quantity)
    {
        $stmt = $this->db->prepare('UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?');
        return $stmt->execute([$quantity, $userId, $productId]);
    }

    public function removeFromCart($userId, $productId)
    {
        $stmt = $this->db->prepare('DELETE FROM cart WHERE user_id = ? AND product_id = ?');
        return $stmt->execute([$userId, $productId]);
    }

    public function clearCart($userId)
    {
        $stmt = $this->db->prepare('DELETE FROM cart WHERE user_id = ?');
        return $stmt->execute([$userId]);
    }

    public function getCartTotal($userId)
    {
        $stmt = $this->db->prepare('SELECT SUM(c.quantity * p.price) as total
                                   FROM cart c
                                   LEFT JOIN products p ON c.product_id = p.id
                                   WHERE c.user_id = ?');
        $stmt->execute([$userId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }
} 