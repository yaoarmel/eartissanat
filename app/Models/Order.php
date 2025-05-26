<?php

namespace App\Models;

use Core\Database;
use PDO;

class Order
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getUserOrders($userId)
    {
        $stmt = $this->db->prepare('SELECT o.*, p.name as product_name, p.price 
                                   FROM orders o
                                   LEFT JOIN products p ON o.product_id = p.id
                                   WHERE o.user_id = ?
                                   ORDER BY o.created_at DESC');
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrderById($id)
    {
        $stmt = $this->db->prepare('SELECT o.*, p.name as product_name, p.price,
                                          u.first_name, u.last_name, u.email, u.phone_number
                                   FROM orders o
                                   LEFT JOIN products p ON o.product_id = p.id
                                   LEFT JOIN users u ON o.user_id = u.id
                                   WHERE o.id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createOrder($userId, $productId, $quantity, $status = 'pending')
    {
        $stmt = $this->db->prepare('INSERT INTO orders (user_id, product_id, quantity, status, created_at)
                                   VALUES (?, ?, ?, ?, NOW())');
        return $stmt->execute([$userId, $productId, $quantity, $status]);
    }

    public function updateOrderStatus($orderId, $status)
    {
        $stmt = $this->db->prepare('UPDATE orders SET status = ? WHERE id = ?');
        return $stmt->execute([$status, $orderId]);
    }
} 