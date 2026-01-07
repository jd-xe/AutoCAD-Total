<?php

namespace Jd\Amisam\Controllers\Admin;

use Jd\Amisam\Controllers\ErrorController;
use Jd\Amisam\Core\View;
use Jd\Amisam\Middlewares\Middleware;
use Jd\Amisam\Models\Pago;
use Jd\Amisam\Services\MailService;
use Jd\Amisam\Models\User;

class PagoController
{
    private $pago;
    private $mailService;
    private $user;

    public function __construct()
    {
        Middleware::checkRole(['administrador']);
        $this->pago = new Pago();
        $this->user = new User();
        $this->mailService = new MailService();
    }

    public function listar()
    {
        $pagos = $this->pago->listarPagos();

        if (!$pagos) {
            (new ErrorController)->notFound('No hay pagos registrados.');
            return;
        }

        View::render('admin/pagos', ['pagos' => $pagos]);
    }

    public function aprobar()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['pago_id'])) {
            header('Location: ' . BASE_URL . '/admin/dashboard/pagos?error=invalid_request');
            exit;
        }

        $pagoId = intval($_POST['pago_id']);
        $pago = $this->pago->obtenerPagoPorId($pagoId);

        if (!$pago) {
            header('Location: ' . BASE_URL . '/admin/dashboard/pagos?error=payment_not_found');
            exit;
        }

        if (!$this->pago->actualizarEstado($pagoId, 'aprobado')) {
            header('Location: ' . BASE_URL . '/admin/dashboard/pagos?error=update_failed');
            exit;
        }

        (new UsuarioController())->generarCredenciales($pago['usuario_id'], $pago['email'], $pago['nombres'], $pago['apellidos']);

        header('Location: ' . BASE_URL . '/admin/dashboard/pagos?success=payment_approved');
        exit;
    }

    public function rechazar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pago_id'])) {
            $pagoId = intval($_POST['pago_id']);
            $this->pago->actualizarEstado($pagoId, 'rechazado');
            header('Location: ' . BASE_URL . '/admin/dashboard/pagos?success=payment_rejected');
            exit;
        }
    }
}
