<?php

namespace Jd\Amisam\Controllers\Estudiante;

use Jd\Amisam\Models\User;
use Jd\Amisam\Core\View;
use Jd\Amisam\Middlewares\Middleware;

class EstudianteController
{
    private $user;
    public function __construct()
    {
        Middleware::checkRole(['estudiante']);
        $this->user = new User();
    }
    
    public function obtenerEstudiantePorId($id){
        return $this->user->getUserById($id);
    }
    
    public function cambiarClave()
    {
        if (!isset($_SESSION['user_id'])) {
            (new ErrorController())->unauthorized('Debes iniciar sesión para acceder a esta página.');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuarioId = $_SESSION['user_id'];
            $claveActual = $_POST['password_actual'] ?? '';
            $nuevaClave = $_POST['nueva_password'] ?? '';
            $confirmarClave = $_POST['confirmar_password'] ?? '';

            if ($nuevaClave !== $confirmarClave) {
                View::render('estudiantes/configuracion', ['error' => 'Las contraseñas no coinciden']);
                return;
            }

            $usuario = $this->user->obtenerPorId($usuarioId);

            if (!$usuario || !password_verify($claveActual, $usuario['password'])) {
                View::render('estudiantes/configuracion', ['error' => 'Contraseña actual incorrecta']);
                return;
            }

            $nuevaClaveHash = password_hash($nuevaClave, PASSWORD_DEFAULT);
            $this->user->actualizarClave($usuarioId, $nuevaClaveHash);

            $_SESSION['success'] = 'Contraseña actualizada correctamente';
            View::render('estudiantes/configuracion', ['success' => 'Contraseña cambiada correctamente.']);
            exit;
        } else {
            View::render('estudiantes/configuracion', ['error' => 'Debe completar todos los campos.']);
        }
    }
}
