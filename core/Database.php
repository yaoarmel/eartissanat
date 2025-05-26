<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $instance = null;
    private static string $host = 'localhost';
    private static string $port = '3306';        // Port par défaut MySQL
    private static string $dbname = 'eartissanat'; // Nom de la base de données
    private static string $username = 'root';    // Utilisateur par défaut de WampServer
    private static string $password = '';        // Mot de passe par défaut de WampServer

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            try {
                $dsn = 'mysql:host=' . self::$host . ';port=' . self::$port . ';dbname=' . self::$dbname;
                self::$instance = new PDO($dsn, self::$username, self::$password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->exec("SET NAMES utf8mb4");
            } catch (PDOException $e) {
                die('❌ Erreur de connexion MySQL : ' . $e->getMessage());
            }
        }
        return self::$instance;
    }

    public static function disconnect(): void
    {
        self::$instance = null;
    }
}
