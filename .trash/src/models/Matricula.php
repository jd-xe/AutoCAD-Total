<?php

namespace Jd\Amisam\Models;

use Jd\Amisam\Config\Database;
use PDO;

class Matricula
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function obtenerEstadoMatricula($usuario_id)
    {
        $sql = "SELECT matricula_id, grupo_id, estado FROM matriculas 
                WHERE usuario_id = ? 
                ORDER BY fecha_matricula DESC 
                LIMIT 1";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute([$usuario_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Registra una matrícula para un estudiante en un grupo específico.
     *
     * @param int $userId ID del estudiante.
     * @param int $grupoId ID del grupo en el que se inscribe.
     * @param string|null $comentario Comentario opcional sobre la matrícula.
     * @return bool Devuelve `true` si el registro fue exitoso, `false` en caso contrario.
     */
    public function registrarMatricula($userId, $grupoId, $comentario = null)
    {
        try {
            $stmt = $this->db->getConnection()->prepare("
                INSERT INTO matriculas (usuario_id, grupo_id, estado, comentario)
                VALUES (:usuario_id, :grupo_id, 'pendiente', :comentario)
            ");
            $stmt->execute([
                'usuario_id' => $userId,
                'grupo_id' => $grupoId,
                'comentario' => $comentario
            ]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function crearMatricula($usuarioId, $grupoId, $pagoId, $estado)
    {
        $sql = "INSERT INTO matriculas (usuario_id, grupo_id, pago_id, fecha_matricula, estado) 
            VALUES (:usuario_id, :grupo_id, :pago_id, NOW(), :estado)";

        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':usuario_id', $usuarioId, PDO::PARAM_INT);
        $stmt->bindParam(':grupo_id', $grupoId, PDO::PARAM_INT);
        $stmt->bindParam(':pago_id', $pagoId, PDO::PARAM_STR);
        $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getCantidadMatriculados($grupoId)
    {
        $sql = "SELECT COUNT(*) AS total_matriculados
            FROM matriculas
            WHERE grupo_id = :grupo_id";

        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':grupo_id', $grupoId, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_matriculados'] ?? 0;
    }

    public function getMatriculaByUserId($userId)
    {
        try {
            $query = "SELECT m.matricula_id, m.usuario_id, m.estado, m.grupo_id, c.nombre AS curso, g.fecha_inicio, g.fecha_fin
                  FROM matriculas m
                  INNER JOIN grupos g ON m.grupo_id = g.grupo_id
                  INNER JOIN cursos c ON g.curso_id = c.curso_id
                  WHERE m.usuario_id = :usuario_id
                  ORDER BY m.fecha_matricula DESC
                  LIMIT 1";

            $stmt = $this->db->getConnection()->prepare($query);
            $stmt->bindParam(':usuario_id', $userId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            error_log("Error al obtener matrícula: " . $e->getMessage());
            return false;
        }
    }

    public function obtenerMatriculaPorUsuarioYConcepto($usuarioId, $conceptoId)
    {
        $sql = "SELECT m.* 
            FROM matriculas m
            INNER JOIN pagos p ON m.pago_id = p.pago_id
            WHERE m.usuario_id = :usuario_id 
            AND p.concepto_id = :concepto_id
            AND m.estado IN ('confirmado', 'pendiente')";

        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':usuario_id', $usuarioId, PDO::PARAM_INT);
        $stmt->bindParam(':concepto_id', $conceptoId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Devuelve la matrícula si existe
    }
}
