<?php

namespace App\Controllers;

use App\Models\Notification;
use Core\Session;
use App\Middleware\AuthMiddleware;

class NotificationController
{
    private Notification $notificationModel;

    public function __construct()
    {
        $this->notificationModel = new Notification();
    }

    public function index()
    {
        AuthMiddleware::isAuthenticated();
        $userId = Session::getUserId();
        
        $title = 'Mes notifications';
        $notifications = $this->notificationModel->getUserNotifications($userId);
        
        \App\Core\View::render('notifications/index', [
            'title' => $title,
            'notifications' => $notifications
        ]);
    }

    public function markAsRead()
    {
        AuthMiddleware::isAuthenticated();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /notifications');
            exit;
        }

        $userId = Session::getUserId();
        $notificationId = $_POST['notification_id'] ?? null;

        if ($notificationId) {
            $this->notificationModel->markAsRead($notificationId, $userId);
        }

        header('Location: /notifications');
        exit;
    }

    public function markAllAsRead()
    {
        AuthMiddleware::isAuthenticated();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /notifications');
            exit;
        }

        $userId = Session::getUserId();
        $this->notificationModel->markAllAsRead($userId);

        header('Location: /notifications');
        exit;
    }
} 