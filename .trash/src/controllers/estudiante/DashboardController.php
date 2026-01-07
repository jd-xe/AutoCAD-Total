<?php

namespace Jd\Amisam\Controllers\Estudiante;

use Jd\Amisam\Core\View;
use Jd\Amisam\Models\Horario;
use Jd\Amisam\Models\Matricula;
use Jd\Amisam\Models\Pago;
use Jd\Amisam\Controllers\ErrorController;
use Jd\Amisam\Middlewares\Middleware;

class DashboardController
{
    private $matricula;
    private $pago;
    private $horario;

    public function __construct()
    {
        Middleware::checkRole(['estudiante']);
        $this->matricula = new Matricula();
        $this->pago = new Pago();
        $this->horario = new Horario();
    }

    public function index()
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['rol'] !== 'estudiante') {
            (new ErrorController())->unauthorized('Debes iniciar sesión para acceder a esta página.');
            return;
        }

        $userId = $_SESSION['user_id'];
        $matricula = $this->matricula->getMatriculaByUserId($userId);
        $pagos = $matricula ? $this->pago->obtenerPagosPorUsuario($matricula['usuario_id']) : [];
        View::render('estudiantes/dashboard', ['matricula' => $matricula, 'pagos' => $pagos]);
    }

    public function perfil()
    {
        if (!isset($_SESSION['user_id'])) {
            (new ErrorController())->unauthorized('Debes iniciar sesión.');
            return;
        }
        
        $usuario = (new EstudianteController())->obtenerEstudiantePorId($_SESSION['user_id']);

        View::render('estudiantes/perfil', [
            'usuario' => $usuario
        ]);
    }

    public function pagos()
    {
        if (!isset($_SESSION['user_id'])) {
            (new ErrorController())->unauthorized('Debes iniciar sesión.');
            return;
        }

        $userId = $_SESSION['user_id'];
        $matricula = $this->matricula->getMatriculaByUserId($userId);
        $pagos = $matricula ? $this->pago->obtenerPagosPorUsuario($matricula['usuario_id']) : [];

        View::render('estudiantes/pagos', [
            'pagos' => $pagos
        ]);
    }

    public function matricula()
    {
        if (!isset($_SESSION['user_id'])) {
            (new ErrorController())->unauthorized('Debes iniciar sesión.');
            return;
        }

        $userId = $_SESSION['user_id'];
        $matricula = $this->matricula->getMatriculaByUserId($userId);
        $horarios = [];

        if ($matricula) {
            $horarios = $this->horario->getHorariosPorGrupo($matricula['grupo_id']);
        }

        View::render('estudiantes/matricula', [
            'matricula' => $matricula,
            'horarios' => $horarios
        ]);
    }

    public function configuracion()
    {
        if (!isset($_SESSION['user_id'])) {
            (new ErrorController())->unauthorized('Debes iniciar sesión.');
            return;
        }

        View::render('estudiantes/configuracion', []);
    }
}
