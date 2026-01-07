<?php

namespace Jd\Amisam\Models;

use Jd\Amisam\Config\Database;
use PDO;

class Pago
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    // QUITAR
    public function getPagosByMatricula($matriculaId)
    {
        try {
            if (!$matriculaId) {
                return [];
            }

            $stmt = $this->db->getConnection()->prepare("SELECT * FROM pagos WHERE matricula_id = ?");
            $stmt->execute([$matriculaId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Error al obtener pago por matrícula: " . $e);
            return;
        }
    }

    public function crearPago($usuario_id, $concepto_id, $metodo_pago_id)
    {
        try {
            $this->db->beginTransaction();

            $sql_monto = "SELECT monto FROM conceptos_pago WHERE concepto_id = :concepto_id";
            $stmt_monto = $this->db->getConnection()->prepare($sql_monto);
            $stmt_monto->bindParam(':concepto_id', $concepto_id, PDO::PARAM_INT);
            $stmt_monto->execute();
            $monto = $stmt_monto->fetchColumn();

            if (!$monto) {
                error_log("Error: No se encontró un monto para concepto_id: $concepto_id");
                $this->db->rollBack();
                return false;
            }

            $token_pago = bin2hex(random_bytes(16));
            $estado = 'pendiente';

            $sql = "INSERT INTO pagos (usuario_id, concepto_id, monto, metodo_pago_id, estado, token_pago, fecha_creacion) 
            VALUES (:usuario_id, :concepto_id, :monto, :metodo_pago_id, :estado, :token_pago, NOW())";

            $stmt = $this->db->getConnection()->prepare($sql);

            $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
            $stmt->bindParam(':concepto_id', $concepto_id, PDO::PARAM_INT);
            $stmt->bindParam(':monto', $monto, PDO::PARAM_STR);
            $stmt->bindParam(':metodo_pago_id', $metodo_pago_id, PDO::PARAM_INT);
            $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
            $stmt->bindParam(':token_pago', $token_pago, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $this->db->commit();
                error_log("Pago creado con éxito para el usuario_id: $usuario_id con token: $token_pago y monto: $monto");
                return $token_pago;
            } else {
                error_log("Error al crear el pago para usuario_id: $usuario_id");
                $this->db->rollBack();
            }
        } catch (\Exception $e) {
            error_log("Error al crear el pago: " . $e->getMessage());
            $this->db->rollBack();
        }
        return false;
    }


    public function obtenerPagosPorUsuario($usuario_id)
    {
        try {
            $sql = "SELECT p.*, c.concepto_id, c.nombre as concepto FROM pagos p JOIN conceptos_pago c ON p.concepto_id = c.concepto_id WHERE p.usuario_id = :usuario_id";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Error al registrar pago: " . $e);
            return;
        }
    }
    public function obtenerPagoPorId($pagoId)
    {
        try {
            $sql = "SELECT p.pago_id, u.usuario_id, u.nombres, u.apellidos, u.username, u.email 
            FROM pagos p
            JOIN usuarios u ON p.usuario_id = u.usuario_id
            WHERE p.pago_id = :pago_id";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindParam(":pago_id", $pagoId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            error_log("Error al obtener el pago por id: $pagoId\nError:" . $e->getMessage());
            return false;
        }
    }

    public function obtenerPagoPorToken($token_pago)
    {
        $sql = "SELECT * FROM pagos WHERE token_pago = :token_pago LIMIT 1";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':token_pago', $token_pago);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //REVISAR Y QUITAR
    public function confirmarPago($pago_id)
    {
        $sql = "UPDATE pagos SET estado = 'completado' WHERE id = :pago_id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':pago_id', $pago_id, PDO::PARAM_INT);
        return $stmt->execute();
    }


    public function actualizarEstadoPago($pago_id, $estado)
    {
        $sql = "UPDATE pagos SET estado = :estado WHERE pago_id = :pago_id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':pago_id', $pago_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function guardarComprobante($pago_id, $url_comprobante)
    {
        $sql = "UPDATE pagos SET comprobante_url = :url_comprobante, estado = 'verificacion' WHERE pago_id = :pago_id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':url_comprobante', $url_comprobante);
        $stmt->bindParam(':pago_id', $pago_id);

        return $stmt->execute();
    }

    public function listarPagos()
    {
        try {
            $sql = "SELECT p.pago_id, u.nombres, u.apellidos, p.monto, p.estado, p.comprobante_url 
                            FROM pagos p
                            JOIN usuarios u ON p.usuario_id = u.usuario_id
                            ORDER BY p.fecha_creacion DESC";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            error_log("Error al listar pagos: " . $e->getMessage());
            return false;
        }
    }

    public function actualizarEstado($pagoId, $estado)
    {
        try {
            $sql = "UPDATE pagos SET estado = :estado, token_pago = NULL, fecha_pago = NOW() WHERE pago_id = :pago_id";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
            $stmt->bindParam(":pago_id", $pagoId, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (\Exception $e) {
            error_log("Error al actualizar estado: " . $e->getMessage());
            return false;
        }
    }

    # REVISAR Y QUITAR DE SER NECESARIO
    public function obtenerComprobantesPorUsuario($usuarioId)
    {
        $stmt = $this->db->getConnection()->prepare("SELECT comprobante_pago FROM pagos WHERE usuario_id = ?");
        $stmt->execute([$usuarioId]);
        return $stmt->fetchAll();
    }

    public function obtenerConceptoPorId($concepto_id)
    {
        $sql = "SELECT * FROM conceptos_pago WHERE id = :id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':id', $concepto_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerCursoPorConcepto($conceptoPagoId)
    {
        $query = "SELECT curso_id FROM conceptos_pago WHERE id = :conceptoPagoId";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':conceptoPagoId', $conceptoPagoId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function obtenerPagoAprobadoPorUsuario($usuarioId)
    {
        try {
            $query = "SELECT p.pago_id, p.usuario_id, p.monto, p.estado, c.concepto_id, c.descripcion 
              FROM pagos p
              INNER JOIN conceptos_pago c ON p.concepto_id = c.concepto_id
              WHERE p.usuario_id = :usuario_id AND p.estado = 'aprobado'
              ORDER BY p.pago_id DESC LIMIT 1";

            $stmt = $this->db->getConnection()->prepare($query);
            $stmt->bindParam(':usuario_id', $usuarioId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            error_log("Error al obtener el pago aprobado para el usuario: $usuarioId");
            return false;
        }
    }
}
