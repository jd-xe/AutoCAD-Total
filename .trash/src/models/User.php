<?php

namespace Jd\Amisam\Models;

use PDO;

class User
{
    private $db;
    private $userRole;

    public function __construct()
    {
        $this->db = \Jd\Amisam\Config\Database::getInstance();
        $this->userRole = new Role();
    }

    public function getUserById($userId)
    {
        try {
            $stmt = $this->db->getConnection()->prepare("
            SELECT u.*, p.* 
            FROM usuarios u
            LEFT JOIN perfiles_usuario p ON u.usuario_id = p.usuario_id
            WHERE u.usuario_id = :id
        ");
            $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception("Error al obtener el usuario: " . $e->getMessage());
        }
    }

    public function actualizarPasswordUsuario($usuarioId, $passwordHash)
    {
        $sql = "UPDATE usuarios SET password = :password WHERE usuario_id = :usuario_id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(":password", $passwordHash, PDO::PARAM_STR);
        $stmt->bindParam(":usuario_id", $usuarioId, PDO::PARAM_INT);
        return $stmt->execute();
    }


    /**
     * Crea un nuevo usuario y su perfil asociado en la base de datos.
     *
     * @param array $userData Datos del usuario a registrar. Debe incluir las claves:
     *     - 'nombres' (string): El nombre del usuario.
     *     - 'apellidos' (string): Los apellidos del usuario.
     *     - 'dni' (string): El DNI del usuario.
     *     - 'email' (string): El correo electrónico del usuario.
     *     - 'username' (string): El nombre de usuario.
     *     - 'password' (string): La contraseña del usuario (ya debe estar cifrada).
     *     - 'telefono' (string): El número de teléfono del usuario.
     * @param array $profileData Datos del perfil del usuario. Debe incluir las claves:
     *     - 'direccion' (string): La dirección del usuario.
     *     - 'fecha_nacimiento' (string): La fecha de nacimiento del usuario (formato 'YYYY-MM-DD').
     * @return bool Devuelve `true` si el registro fue exitoso, `false` en caso de error.
     * @throws \PDOException Si ocurre un error en alguna de las consultas SQL.
     */
    public function createUser($userData, $profileData)
    {
        try {
            $this->db->beginTransaction();

            $stmt = $this->db->getConnection()->prepare("
                INSERT INTO usuarios (nombres, apellidos, dni, email, username, password, telefono, token_confirmacion)
                VALUES (:nombres, :apellidos, :dni, :email, :username, :password, :telefono, :token_confirmacion)
            ");

            $stmt->execute($userData);
            $userId = $this->db->getConnection()->lastInsertId();

            $stmt = $this->db->getConnection()->prepare("
                INSERT INTO perfiles_usuario (usuario_id, direccion, fecha_nacimiento)
                VALUES (:usuario_id, :direccion, :fecha_nacimiento)
            ");

            $profileData['usuario_id'] = $userId;
            $stmt->execute($profileData);

            if (!$this->userRole->assignRole($userId, 3)) {
                throw new \Exception("Error al asignar el rol al usuario.");
            }

            $this->db->commit();
            return $userId;
        } catch (\PDOException $e) {
            $this->db->rollBack();
            error_log("Error en createUser: " . $e->getMessage());
            return false;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Obtiene todos los usuarios activos (no eliminados) de la base de datos.
     *
     * Un usuario se considera activo si su columna `deleted_at` es `NULL`.
     *
     * @return array Lista de usuarios activos. Cada usuario es representado como un array asociativo.
     * @throws \Exception Si ocurre un error al ejecutar la consulta SQL.
     */
    public function getAllActiveUsers(): array
    {
        try {
            $stmt = $this->db->getConnection()->prepare("
            SELECT u.*, p.perfil_id ,p.direccion, p.fecha_nacimiento 
            FROM usuarios u
            LEFT JOIN perfiles_usuario p on u.usuario_id = p.usuario_id
            WHERE u.deleted_at IS NULL
        ");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception("Error al obtener usuarios activos: " . $e->getMessage());
        }
    }



    public function getPaginatedUsers(int $limit, int $offset): array
    {
        try {
            $stmt = $this->db->getConnection()->prepare("
            SELECT u.usuario_id, u.nombres, u.apellidos, u.email, u.telefono, 
                   p.direccion, p.fecha_nacimiento, r.nombre as rol
            FROM usuarios u
            LEFT JOIN perfiles_usuario p ON u.usuario_id = p.usuario_id
            LEFT JOIN usuario_rol ur ON u.usuario_id = ur.usuario_id
            LEFT JOIN roles r ON ur.rol_id = r.rol_id
            WHERE u.deleted_at IS NULL
            ORDER BY u.usuario_id DESC
            LIMIT :limit OFFSET :offset
        ");
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception("Error al obtener usuarios paginados: " . $e->getMessage());
        }
    }

    public function countActiveUsers(): int
    {
        try {
            $stmt = $this->db->getConnection()->prepare("
            SELECT COUNT(*) as total FROM usuarios WHERE deleted_at IS NULL
        ");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'] ?? 0;
        } catch (\PDOException $e) {
            throw new \Exception("Error al contar usuarios activos: " . $e->getMessage());
        }
    }
    
    public function getUsersGroupedByRole(int $limit, int $offset): array
    {
        try {
            $stmt = $this->db->getConnection()->prepare("
            SELECT u.usuario_id, u.nombres, u.apellidos, u.email, u.telefono, 
                   p.direccion as direccion, p.fecha_nacimiento, r.nombre as rol
            FROM usuarios u
            LEFT JOIN perfiles_usuario p ON u.usuario_id = p.usuario_id
            LEFT JOIN usuario_rol ur ON u.usuario_id = ur.usuario_id
            LEFT JOIN roles r ON ur.rol_id = r.rol_id
            WHERE u.deleted_at IS NULL
            ORDER BY r.nombre ASC, u.usuario_id DESC
            LIMIT :limit OFFSET :offset
        ");
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception("Error al obtener usuarios agrupados por rol: " . $e->getMessage());
        }
    }
    
    public function getUsersByRole(string $rol, int $limit, int $offset): array
    {
        try {
            $stmt = $this->db->getConnection()->prepare("
            SELECT u.usuario_id, u.nombres, u.apellidos, u.email, u.telefono, 
                   p.direccion, p.fecha_nacimiento, r.nombre as rol
            FROM usuarios u
            LEFT JOIN perfiles_usuario p ON u.usuario_id = p.usuario_id
            LEFT JOIN usuario_rol ur ON u.usuario_id = ur.usuario_id
            LEFT JOIN roles r ON ur.rol_id = r.rol_id
            WHERE u.deleted_at IS NULL AND r.nombre = :rol
            ORDER BY u.usuario_id DESC
            LIMIT :limit OFFSET :offset
        ");
            $stmt->bindValue(':rol', $rol, PDO::PARAM_STR);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception("Error al obtener usuarios por rol: " . $e->getMessage());
        }
    }

    public function countUsersByRole(string $rol): int
    {
        try {
            $stmt = $this->db->getConnection()->prepare("
            SELECT COUNT(*) as total FROM usuarios u
            LEFT JOIN usuario_rol ur ON u.usuario_id = ur.usuario_id
            LEFT JOIN roles r ON ur.rol_id = r.rol_id
            WHERE u.deleted_at IS NULL AND r.nombre = :rol
        ");
            $stmt->bindValue(':rol', $rol, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'] ?? 0;
        } catch (\PDOException $e) {
            throw new \Exception("Error al contar usuarios por rol: " . $e->getMessage());
        }
    }


    /**
     * Actualiza los datos de un usuario en la base de datos
     * 
     * @param int $userId ID del usuario a actualizar.
     * @param array $userData Datos del usuario a actualizar. Debe incluir las claves:
     *     - 'nombres' (string): El nombre del usuario.
     *     - 'apellidos' (string): Los apellidos del usuario.
     *     - 'dni' (string): El DNI del usuario.
     *     - 'email' (string): El correo electrónico del usuario.
     *     - 'username' (string): El nombre de usuario.
     *     - 'telefono' (string): El número de teléfono del usuario.
     * @return bool Devuelve `true` si la actualización fue exitosa, de lo contrario lanza una excepción.
     * @throws \Exception Si ocurre un error al ejecutar la consulta.
     */

    public function updateUser($userId, $userData)
    {
        try {
            $stmt = $this->db->getConnection()->prepare("
            UPDATE usuarios
            SET nombres = :nombres, apellidos = :apellidos, dni = :dni, email = :email,
                username = :username, telefono = :telefono
            WHERE id = :id
        ");
            $userData['id'] = $userId; // Añadimos el ID del usuario
            return $stmt->execute($userData);
        } catch (\PDOException $e) {
            throw new \Exception("Error al actualizar el usuario: " . $e->getMessage());
        }
    }

    /**
     * Marca a un usuario como eliminado en la base de datos, asignando la fecha y hora actual
     * a la columna `deleted_at`.
     *
     * Este método no elimina físicamente el registro del usuario, sino que utiliza
     * un enfoque de "eliminación lógica".
     *
     * @param int $userId El ID del usuario que se desea eliminar.
     * @return bool Devuelve `true` si la operación fue exitosa, `false` en caso contrario.
     * @throws \Exception Si ocurre un error al ejecutar la consulta SQL.
     */
    public function deleteUser($userId)
    {
        try {
            $stmt = $this->db->getConnection()->prepare("
            UPDATE usuarios
            SET deleted_at = NOW()
            WHERE id = :id
        ");
            return $stmt->execute(['id' => $userId]);
        } catch (\PDOException $e) {
            throw new \Exception("Error al eliminar el usuario: " . $e->getMessage());
        }
    }

    /**
     * Restaura un usuario previamente eliminado, estableciendo la columna `deleted_at` como `NULL`.
     *
     * Este método permite "reactivar" un usuario que fue eliminado lógicamente.
     *
     * @param int $userId El ID del usuario que se desea restaurar.
     * @return bool Devuelve `true` si la operación fue exitosa, `false` en caso contrario.
     * @throws \Exception Si ocurre un error al ejecutar la consulta SQL.
     */
    public function restoreUser($userId)
    {
        try {
            $stmt = $this->db->getConnection()->prepare("
            UPDATE usuarios
            SET deleted_at = NULL
            WHERE id = :id
        ");
            return $stmt->execute(['id' => $userId]);
        } catch (\PDOException $e) {
            throw new \Exception("Error al restaurar el usuario: " . $e->getMessage());
        }
    }

    public function getUserByToken($token)
    {
        $stmt = $this->db->getConnection()->prepare("SELECT * FROM usuarios WHERE token_confirmacion = ?");
        $stmt->execute([$token]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function confirmUser($usuario_id)
    {
        $stmt = $this->db->getConnection()->prepare("UPDATE usuarios SET token_confirmacion = NULL WHERE usuario_id = ?");
        return $stmt->execute([$usuario_id]);
    }
    
    public function findByEmail(string $email)
    {
        $query = "SELECT * 
              FROM usuarios 
              WHERE email = :email 
              LIMIT 1";

        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id)
    {
        $query = "SELECT * FROM usuarios WHERE usuario_id = :id";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarClave($id, $nuevaClave)
    {
        $query = "UPDATE usuarios SET password = :password WHERE usuario_id = :id";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':password', $nuevaClave, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}


