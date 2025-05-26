<?php

namespace App\Models;

use Core\Database;
use PDO;

class Notification
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getUserNotifications($userId)
    {
        $stmt = $this->db->prepare('SELECT * FROM notifications WHERE user_id = ? ORDER BY created_at DESC');
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUnreadCount($userId)
    {
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM notifications WHERE user_id = ? AND is_read = 0');
        $stmt->execute([$userId]);
        return $stmt->fetchColumn();
    }

    public function markAsRead($notificationId, $userId)
    {
        $stmt = $this->db->prepare('UPDATE notifications SET is_read = 1 WHERE id = ? AND user_id = ?');
        return $stmt->execute([$notificationId, $userId]);
    }

    public function markAllAsRead($userId)
    {
        $stmt = $this->db->prepare('UPDATE notifications SET is_read = 1 WHERE user_id = ?');
        return $stmt->execute([$userId]);
    }

    public function createNotification($userId, $type, $message, $link = null)
    {
        $stmt = $this->db->prepare('INSERT INTO notifications (user_id, type, message, link, created_at) 
                                   VALUES (?, ?, ?, ?, NOW())');
        return $stmt->execute([$userId, $type, $message, $link]);
    }
} 