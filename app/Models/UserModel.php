<?php

namespace App\Models;

use Core\Database;
use PDO;

class UserModel
{
    protected PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function add_user($last_name, $first_name, $number, $password): bool
    {
        $sql = "INSERT INTO users (last_name, first_name, phone_number, password_hash) VALUES (:last_name, :first_name, :number, :password)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':last_name' => $last_name,
            ':first_name' => $first_name,
            ':number' => $number,
            ':password' => $password,
        ]);
    }

    // login 
    public function login($number, $password): bool
    {
        $sql = "SELECT * FROM users WHERE phone_number = :number";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':number' => $number]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password_hash'])) {
            return true;
        }
        return false;
    }

    public function get_user($number): array
    {
        $sql = "SELECT * FROM users WHERE phone_number = :number";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':number' => $number]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // get user by id
    public function get_user_by_id($id): array
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // update user 
    public function update_user($id, $last_name, $first_name, $number, $email, $age, $address): bool
    {
        $sql = "UPDATE users SET last_name = :last_name, first_name = :first_name, phone_number = :number, email = :email, age = :age, address = :address WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':last_name' => $last_name,
            ':first_name' => $first_name,
            ':number' => $number,
            ':email' => $email,
            ':age' => $age,
            ':address' => $address,
        ]);
    }




}