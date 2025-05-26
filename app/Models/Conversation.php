<?php

namespace App\Models;

use Core\Database;
use PDO;

class Conversation
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getUserConversations($userId)
    {
        $stmt = $this->db->prepare('SELECT c.*, 
                                          u1.first_name as sender_name,
                                          u2.first_name as receiver_name,
                                          m.content as last_message,
                                          m.created_at as last_message_date
                                   FROM conversations c
                                   LEFT JOIN users u1 ON c.sender_id = u1.id
                                   LEFT JOIN users u2 ON c.receiver_id = u2.id
                                   LEFT JOIN messages m ON c.last_message_id = m.id
                                   WHERE c.sender_id = ? OR c.receiver_id = ?
                                   ORDER BY m.created_at DESC');
        $stmt->execute([$userId, $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getConversation($id, $userId)
    {
        $stmt = $this->db->prepare('SELECT c.*, 
                                          u1.first_name as sender_name,
                                          u2.first_name as receiver_name
                                   FROM conversations c
                                   LEFT JOIN users u1 ON c.sender_id = u1.id
                                   LEFT JOIN users u2 ON c.receiver_id = u2.id
                                   WHERE c.id = ? AND (c.sender_id = ? OR c.receiver_id = ?)');
        $stmt->execute([$id, $userId, $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getMessages($conversationId)
    {
        $stmt = $this->db->prepare('SELECT m.*, u.first_name as sender_name 
                                   FROM messages m
                                   LEFT JOIN users u ON m.sender_id = u.id
                                   WHERE m.conversation_id = ?
                                   ORDER BY m.created_at ASC');
        $stmt->execute([$conversationId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function sendMessage($conversationId, $senderId, $content)
    {
        // Insérer le message
        $stmt = $this->db->prepare('INSERT INTO messages (conversation_id, sender_id, content, created_at) 
                                   VALUES (?, ?, ?, NOW())');
        $stmt->execute([$conversationId, $senderId, $content]);
        $messageId = $this->db->lastInsertId();

        // Mettre à jour le dernier message de la conversation
        $stmt = $this->db->prepare('UPDATE conversations SET last_message_id = ? WHERE id = ?');
        $stmt->execute([$messageId, $conversationId]);

        return $messageId;
    }

    public function createConversation($senderId, $receiverId)
    {
        // Vérifier si une conversation existe déjà
        $stmt = $this->db->prepare('SELECT id FROM conversations 
                                   WHERE (sender_id = ? AND receiver_id = ?) 
                                   OR (sender_id = ? AND receiver_id = ?)');
        $stmt->execute([$senderId, $receiverId, $receiverId, $senderId]);
        $existing = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing) {
            return $existing['id'];
        }

        // Créer une nouvelle conversation
        $stmt = $this->db->prepare('INSERT INTO conversations (sender_id, receiver_id, created_at) 
                                   VALUES (?, ?, NOW())');
        $stmt->execute([$senderId, $receiverId]);
        return $this->db->lastInsertId();
    }
} 