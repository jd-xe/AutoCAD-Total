<?php

namespace Jd\Amisam\Models;

use Jd\Amisam\Config\Database;
use PDO;

class Grupo
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getGruposByCursoId($cursoId)
    {
        try {
            $stmt = $this->db->getConnection()->prepare("SELECT * FROM grupos WHERE curso_id = ?");
            $stmt->execute([$cursoId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Error al obtener grupos por curso: " . $e);
            return;
        }
    }

    public function getGruposDisponibles()
    {
        try {
            $query = "SELECT 
                    g.grupo_id, 
                    c.nombre AS curso, 
                    g.fecha_inicio, 
                    g.fecha_fin, 
                    g.cupo_maximo,
                    CONCAT(u.nombres, ' ', u.apellidos) AS docente
                  FROM grupos g
                  INNER JOIN cursos c ON g.curso_id = c.curso_id
                  INNER JOIN usuarios u ON g.docente_id = u.usuario_id
                  WHERE g.estado = 'activo'";

            $stmt = $this->db->getConnection()->prepare($query);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!$result) {
                error_log("No se encontraron grupos disponibles.");
            }

            return $result;
        } catch (\Exception $e) {
            error_log("Error al obtener los grupos disponibles: " . $e->getMessage());
            return [];
        }
    }

    public function getGruposPorConcepto($conceptoId)
    {
        try {
            $query = "SELECT g.grupo_id, g.curso_id, c.nombre AS curso, g.fecha_inicio, g.fecha_fin 
                  FROM grupos g
                  INNER JOIN cursos c ON g.curso_id = c.curso_id
                  WHERE c.nombre LIKE CONCAT('%', (SELECT nombre FROM conceptos_pago WHERE concepto_id = :concepto_id), '%') 
                  AND g.estado = 'activo'";

            $stmt = $this->db->getConnection()->prepare($query);
            $stmt->bindParam(':concepto_id', $conceptoId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            error_log("Error al obtener grupos por concepto: " . $e->getMessage());
            return false;
        }
    }

    public function getGrupoById($grupoId)
    {
        $sql = "SELECT g.*, c.nombre AS curso
            FROM grupos g
            JOIN cursos c ON g.curso_id = c.curso_id
            WHERE g.grupo_id = :grupo_id";

        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':grupo_id', $grupoId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function actualizarCupo($grupoId)
    {
        $sql = "UPDATE grupos SET cupo_maximo = cupo_maximo - 1 WHERE grupo_id = :grupo_id AND cupo_maximo IS NOT NULL";
        $stmt = $this->db->getConnection()->prepare($sql);
        return $stmt->execute([':grupo_id' => $grupoId]);
    }
}
