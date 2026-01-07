<?php

namespace Jd\Amisam\Models;

use Jd\Amisam\Config\Database;
use PDO;

class Horario
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getHorariosPorGrupo($grupo_id)
    {
        try {
            $query = "SELECT dia, hora_inicio, hora_fin 
              FROM horarios 
              WHERE grupo_id = :grupo_id
              ORDER BY FIELD(dia, 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'), hora_inicio";

            $stmt = $this->db->getConnection()->prepare($query);
            $stmt->bindParam(':grupo_id', $grupo_id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            error_log("Ocurrió un error al obtener horarios por grupo: " . $e->getMessage());
            return false;
        }
    }
}
