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

    public static function has($key)
    {
        self::start();
        return isset($_SESSION[$key]);
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

    public static function getUserId()
    {
        self::start();
        return self::get('user_id');
    }

    public static function setUserId($id)
    {
        self::start();
        self::set('user_id', $id);
    }

    public static function isLoggedIn()
    {
        return self::has('user_id');
    }

    public static function setUser($user)
    {
        self::start();
        self::set('user', $user);
        self::setUserId($user['id']);
    }

    public static function getUser()
    {
        self::start();
        return self::get('user');
    }

    public static function setFlash($key, $message)
    {
        self::start();
        $_SESSION['flash'][$key] = $message;
    }

    public static function getFlash($key)
    {
        self::start();
        if (isset($_SESSION['flash'][$key])) {
            $message = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]);
            return $message;
        }
        return null;
    }

    public static function hasFlash($key)
    {
        self::start();
        return isset($_SESSION['flash'][$key]);
    }
} 