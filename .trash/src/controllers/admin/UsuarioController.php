<?php

namespace Jd\Amisam\Controllers\Admin;

use Jd\Amisam\Controllers\ErrorController;
use Jd\Amisam\Core\View;
use Jd\Amisam\Middlewares\Middleware;
use Jd\Amisam\Models\User;
use Jd\Amisam\Services\MailService;

class UsuarioController
{
    private $user;
    private $mailService;

    public function __construct()
    {
        Middleware::checkRole(['administrador']);
        $this->user = new User();
        $this->mailService = new MailService();
    }
    
    public function listar()
    {
        $rolSeleccionado = $_GET['rol'] ?? 'administrador';

        $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        if ($paginaActual < 1) {
            (new ErrorController())->badRequest();
            return;
        }

        $usuariosPorPagina = 10;
        $offset = ($paginaActual - 1) * $usuariosPorPagina;

        try {
            $totalUsuarios = $this->user->countUsersByRole($rolSeleccionado);
            $totalPaginas = ceil($totalUsuarios / $usuariosPorPagina);

            $usuarios = $this->user->getUsersByRole($rolSeleccionado, $usuariosPorPagina, $offset);

            View::render('admin/listar', [
                'usuarios' => $usuarios,
                'paginaActual' => $paginaActual,
                'totalPaginas' => $totalPaginas,
                'rolSeleccionado' => $rolSeleccionado
            ]);
        } catch (\Exception $e) {
            error_log("Error al obtener usuarios: " . $e->getMessage());
            (new ErrorController())->internalServerError();
        }
    }

    public function generarCredenciales($usuarioId, $email, $nombres, $apellidos)
    {
        $passwordPlano = bin2hex(random_bytes(4));
        $passwordHash = password_hash($passwordPlano, PASSWORD_DEFAULT);

        if (!$this->user->actualizarPasswordUsuario($usuarioId, $passwordHash)) {
            header('Location: dashboard/pagos?error=password_update_failed');
            exit;
        }

        $variables = [
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'username' => $email,
            'password' => $passwordPlano
        ];

        if (!$this->mailService->sendEmail($email, "Tus credenciales de acceso a Amisam", "credentials", $variables)) {
            header('Location: dashboard/pagos?error=email_failed');
            exit;
        }
    }
}
