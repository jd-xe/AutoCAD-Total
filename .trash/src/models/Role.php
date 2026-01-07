<?php

namespace Jd\Amisam\Models;

use Jd\Amisam\Config\Database;
use PDO;

class Role
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function assignRole($userId, $roleId)
    {
        try {
            $stmt = $this->db->getConnection()->prepare("
                INSERT INTO usuario_rol (usuario_id, rol_id)
                VALUES (:usuario_id, :rol_id)
            ");
            $stmt->execute(['usuario_id' => $userId, 'rol_id' => $roleId]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getRoleByUserId($userId)
    {
        try {
            $stmt = $this->db->getConnection()->prepare("SELECT r.nombre 
            FROM roles r 
            JOIN usuario_rol ur ON ur.rol_id = r.rol_id 
            WHERE ur.usuario_id = :usuario_id
            LIMIT 1");
            $stmt->bindParam(':usuario_id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Ocurrió un error al recuperar el rol del estudiante: " . $e->getMessage());
            return;
        }
    }
}
