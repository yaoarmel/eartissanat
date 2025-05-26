<?php

$DB_HOST = 'mydb';
$DB_NAME = 'artisanat';       // ⚠️ adapte à ton vrai nom de base
$DB_USER = 'root';            // ⚠️ adapte si besoin
$DB_PASS = 'test';                // ⚠️ mot de passe WAMP, souvent vide

try {
    $pdo = new PDO("pgsql:host=" . $DB_HOST . ";dbname=" . $DB_NAME, $DB_USER, $DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base : " . $e->getMessage());
}