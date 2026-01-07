<?php

namespace Jd\Amisam\Models;

use Jd\Amisam\Config\Database;
use PDO;

class Curso
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAllCursosActivos()
    {
        try {
            $stmt = $this->db->getConnection()->prepare("SELECT * FROM cursos WHERE estado = 'activo'");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Error al obtener cursos activos: " . $e);
            return;
        }
    }
}
