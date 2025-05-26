<?php

namespace App\Models;

use Core\Database;
use PDO;

class AuthorModel extends UserModel
{
   // get author by id
   public function get_author_by_id($id): array
   {
       $sql = "SELECT * FROM authors WHERE user_id = :id";
       $stmt = $this->db->prepare($sql);
       $stmt->execute([':id' => $id]);
       return $stmt->fetch(PDO::FETCH_ASSOC);
   }

   // isAuthor
    public function isAuthor($id): bool
    {
         $sql = "SELECT * FROM authors WHERE user_id = :id";
         $stmt = $this->db->prepare($sql);
         $stmt->execute([':id' => $id]);
         return $stmt->rowCount() > 0;
    }

}