<?php

namespace Jd\Amisam\Controllers;

use Jd\Amisam\Core\View;
use Jd\Amisam\Models\Pago;
use Jd\Amisam\Services\CloudinaryService;

class PagoController
{
    private $pago;
    private $cloudinary;

    public function __construct()
    {
        $this->pago = new Pago();
        $this->cloudinary = new CloudinaryService();
    }
    public function index()
    {
        null;
    }

    public function verPagos()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL);
            exit;
        }
        $usuario_id = $_SESSION['user_id'];
        $pagos = $this->pago->obtenerPagosPorUsuario($usuario_id);
        View::render('pagos/verPagos', ['pagos' => $pagos]);
    }

    public function pagos_estudiante()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL);
            exit;
        }

        $usuario_id = $_SESSION['user_id']; // Obtiene el ID del usuario logueado
        $pagos = $this->pago->obtenerPagosPorUsuario($usuario_id);

        View::render('pagos/pagos_estudiante', ['pagos' => $pagos]);
    }

    public function subirComprobante()
    {
        if (!isset($_GET['token']) || empty($_GET['token'])) {
            View::render('pagos/status', [
                'title' => 'Error',
                'message' => 'Token de pago no proporcionado.',
                'class' => 'text-danger',
                'buttonClass' => 'btn-danger'
            ]);
            return;
        }

        $token_pago = htmlspecialchars($_GET['token'], ENT_QUOTES, 'UTF-8');
        $pago = $this->pago->obtenerPagoPorToken($token_pago);

        if (!$pago) {
            error_log("Intento de subida con token inválido: $token_pago");
            View::render('pagos/status', [
                'title' => 'Error',
                'message' => 'El token de pago no es válido.',
                'class' => 'text-danger',
                'buttonClass' => 'btn-danger'
            ]);
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['comprobante'])) {

            if ($_FILES['comprobante']['error'] !== UPLOAD_ERR_OK) {
                View::render('pagos/status', [
                    'title' => 'Error',
                    'message' => 'Hubo un problema al subir el archivo. Inténtalo de nuevo.',
                    'class' => 'text-danger',
                    'buttonClass' => 'btn-danger'
                ]);
                return;
            }

            $archivoTmp = $_FILES['comprobante']['tmp_name'];

            $extension = pathinfo($_FILES['comprobante']['name'], PATHINFO_EXTENSION);
            $extensionesPermitidas = ['jpg', 'jpeg', 'png'];

            if (!in_array(strtolower($extension), $extensionesPermitidas)) {
                error_log("Intento de subida de archivo con extensión no permitida: " . $_FILES['comprobante']['name']);
                View::render('pagos/status', [
                    'title' => 'Error',
                    'message' => 'El archivo debe ser JPG, JPEG o PNG.',
                    'class' => 'text-danger',
                    'buttonClass' => 'btn-danger'
                ]);
                return;
            }

            try {
                $nombreArchivo = "boleta_{$pago['usuario_id']}_" . time();
                $urlComprobante = $this->cloudinary->uploadFile($archivoTmp, $nombreArchivo);

                if (!$urlComprobante) {
                    error_log("Ocurrió un error al momento de subir el comprobante. No se pudo subir el archivo a Cloudinary.");
                    View::render('pagos/status', [
                        'title' => 'Error',
                        'message' => 'Error al subir el comprobante.',
                        'class' => 'text-danger',
                        'buttonClass' => 'btn-danger'
                    ]);
                }

                $this->pago->guardarComprobante($pago['pago_id'], $urlComprobante);
                View::render('pagos/status', [
                    'title' => 'Éxito',
                    'message' => 'Operación realizada con éxito.',
                    'class' => 'text-success',
                    'buttonClass' => 'btn-success'
                ]);
            } catch (\Exception $e) {
                error_log("Error al subir comprobante: " . $e->getMessage());
                View::render('pagos/status', [
                    'title' => 'Error',
                    'message' => 'Error al subir el comprobante. Inténtalo más tarde.',
                    'class' => 'text-danger',
                    'buttonClass' => 'btn-danger'
                ]);
            }
        } else {
            View::render('pagos/subir', ['token_pago' => $token_pago]);
        }
    }

    public function aprobarPago($pago_id)
    {
        if ($this->pago->confirmarPago($pago_id)) {
            View::render('admin/pagos', ['message' => 'Pago aprobado con éxito.']);
        } else {
            View::render('pagos/status', [
                'title' => 'Error',
                'message' => 'Error al aprobar el pago.',
                'class' => 'text-danger',
                'buttonClass' => 'btn-danger'
            ]);
        }
    }
}
