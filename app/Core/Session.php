<?php

namespace Core;

class Session
{
    public static function start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set($key, $value)
    {
        self::start();
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        self::start();
        return $_SESSION[$key] ?? $default;
    }

    public static function remove($key)
    {
        self::start();
        unset($_SESSION[$key]);
    }

    public static function destroy()
    {
        self::start();
        session_destroy();
    }

    public static function isLoggedIn()
    {
        return self::get('user_id') !== null;
    }

    public static function getUserId()
    {
        return self::get('user_id');
    }

    public static function setUser($user)
    {
        self::set('user_id', $user['id']);
        self::set('user_email', $user['email']);
        self::set('user_name', $user['first_name'] . ' ' . $user['last_name']);
    }

    public static function getUser()
    {
        if (!self::isLoggedIn()) {
            return null;
        }

        return [
            'id' => self::get('user_id'),
            'email' => self::get('user_email'),
            'name' => self::get('user_name')
        ];
    }
} 