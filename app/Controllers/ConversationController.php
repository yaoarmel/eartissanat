<?php

namespace App\Controllers;

use App\Models\Conversation;
use Core\Session;
use App\Middleware\AuthMiddleware;

class ConversationController
{
    private Conversation $conversationModel;

    public function __construct()
    {
        $this->conversationModel = new Conversation();
    }

    public function index()
    {
        AuthMiddleware::isAuthenticated();
        $userId = Session::getUserId();
        
        $title = 'Mes conversations';
        $conversations = $this->conversationModel->getUserConversations($userId);
        
        \App\Core\View::render('conversations/index', [
            'title' => $title,
            'conversations' => $conversations
        ]);
    }

    public function show($id)
    {
        AuthMiddleware::isAuthenticated();
        $userId = Session::getUserId();
        
        $conversation = $this->conversationModel->getConversation($id, $userId);
        if (!$conversation) {
            header('Location: /conversations');
            exit;
        }

        $title = 'Conversation avec ' . ($conversation['sender_id'] == $userId ? 
                                       $conversation['receiver_name'] : 
                                       $conversation['sender_name']);
        $messages = $this->conversationModel->getMessages($id);
        
        \App\Core\View::render('conversations/show', [
            'title' => $title,
            'conversation' => $conversation,
            'messages' => $messages
        ]);
    }

    public function sendMessage()
    {
        AuthMiddleware::isAuthenticated();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /conversations');
            exit;
        }

        $userId = Session::getUserId();
        $conversationId = $_POST['conversation_id'] ?? null;
        $content = $_POST['content'] ?? '';

        if ($conversationId && $content) {
            $this->conversationModel->sendMessage($conversationId, $userId, $content);
        }

        header('Location: /conversation/' . $conversationId);
        exit;
    }

    public function create()
    {
        AuthMiddleware::isAuthenticated();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /conversations');
            exit;
        }

        $userId = Session::getUserId();
        $receiverId = $_POST['receiver_id'] ?? null;

        if ($receiverId) {
            $conversationId = $this->conversationModel->createConversation($userId, $receiverId);
            header('Location: /conversation/' . $conversationId);
            exit;
        }

        header('Location: /conversations');
        exit;
    }
} 