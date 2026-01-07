<?php

namespace Jd\Amisam\Controllers;

use Jd\Amisam\Core\View;
use Jd\Amisam\Models\Auth;
use Jd\Amisam\Models\Matricula;
use Jd\Amisam\Models\Pago;
use Jd\Amisam\Models\Role;
use Jd\Amisam\Models\User;

class AuthController
{
    private $auth;
    private $role;
    private $matricula;
    private $pago;

    public function __construct()
    {
        $this->auth = new Auth();
        $this->role = new Role();
        $this->matricula = new Matricula();
        $this->pago = new Pago();
    }
    public function login()
    {
        
        header("Access-Control-Allow-Origin: https://www.autocadtotal.com");
        header("Access-Control-Allow-Methods: POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");
        header("Access-Control-Allow-Credentials: true");
    
        // Manejar solicitudes OPTIONS (preflight)
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            exit; // No necesitas procesar nada más para una solicitud OPTIONS
        }
    
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Método no permitido']);
            exit;
        }
    
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Método no permitido']);
            exit;
        }

        $input = json_decode(file_get_contents("php://input"), true);
        $email = trim($input['email'] ?? '');
        $password = trim($input['password'] ?? '');

        if (empty($email) || empty($password)) {
            echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios']);
            exit;
        }

        $user = $this->auth->getUserByEmail($email);

        if (!$user || !password_verify($password, $user['password'])) {
            echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas']);
            exit;
        }

        $_SESSION['user_id'] = $user['usuario_id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['usuario_nombres'] = $user['nombres'];

        $roleData = $this->role->getRoleByUserId($user['usuario_id']);
        $_SESSION['rol'] = $roleData['nombre'] ?? null;

        $redirect = BASE_URL . "/home";

        if ($_SESSION['rol'] === 'estudiante') {
            $pagoAprobado = $this->pago->obtenerPagoAprobadoPorUsuario($user['usuario_id']);
            $matricula = $this->matricula->getMatriculaByUserId($user['usuario_id']);

            if ($pagoAprobado && !$matricula) {
                // Si tiene un pago aprobado pero no matrícula, debe matricularse
                $redirect = BASE_URL . "/estudiante/matricula";
            } elseif ($matricula) {
                // Si ya tiene matrícula, revisar su estado
                switch ($matricula['estado']) {
                    case 'pendiente':
                        $redirect = BASE_URL . "/estudiante/pago-pendiente";
                        break;
                    case 'confirmado':
                        $redirect = BASE_URL . "/estudiante/dashboard";
                        break;
                    case 'cancelado':
                        $redirect = BASE_URL . "/estudiante/matricula-cancelada";
                        break;
                    default:
                        $redirect = BASE_URL . "/contact";
                }
            }
        } elseif ($_SESSION['rol'] === 'administrador') {
            $redirect = BASE_URL . "/admin/dashboard";
        }

        echo json_encode(['success' => true, 'redirect' => $redirect]);
        exit;
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . "/");
        exit;
    }
}
