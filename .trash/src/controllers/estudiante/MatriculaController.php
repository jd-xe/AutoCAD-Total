<?php

namespace Jd\Amisam\Controllers\Estudiante;

use Jd\Amisam\Core\View;
use Jd\Amisam\Models\Curso;
use Jd\Amisam\Models\Grupo;
use Jd\Amisam\Models\Horario;
use Jd\Amisam\Models\Matricula;
use Jd\Amisam\Models\Pago;
use Jd\Amisam\Controllers\ErrorController;
use Jd\Amisam\Middlewares\Middleware;

class MatriculaController
{
    private $matricula;
    private $pago;
    private $curso;
    private $grupo;
    private $horario;

    public function __construct()
    {
        Middleware::checkRole(['estudiante']);
        $this->matricula = new Matricula();
        $this->pago = new Pago();
        $this->curso = new Curso();
        $this->grupo = new Grupo();
        $this->horario = new Horario();
    }

    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            (new ErrorController())->unauthorized('Debes iniciar sesión para acceder al proceso de matrícula.');
            return;
        }

        $usuarioId = $_SESSION['user_id'];

        try {
            $pagoAprobado = $this->pago->obtenerPagoAprobadoPorUsuario($usuarioId);

            if (!$pagoAprobado) {
                (new ErrorController())->forbidden('No tienes un pago aprobado para matricularte.');
                return;
            }

            $conceptoId = $pagoAprobado['concepto_id'];

            $matriculaExistente = $this->matricula->obtenerMatriculaPorUsuarioYConcepto($usuarioId, $conceptoId);
            if ($matriculaExistente) {
                (new ErrorController())->conflict('Ya estás matriculado en este curso.');
                return;
            }

            $gruposDisponibles = $this->grupo->getGruposPorConcepto($conceptoId);
            if (!is_array($gruposDisponibles)) {
                $gruposDisponibles = [];
            }

            $horariosPorGrupo = [];
            foreach ($gruposDisponibles as $grupo) {
                $horarios = $this->horario->getHorariosPorGrupo($grupo['grupo_id']);
                $horariosPorGrupo[$grupo['grupo_id']] = is_array($horarios) ? $horarios : [];
            }

            View::render('estudiantes/matricular', compact('pagoAprobado', 'gruposDisponibles', 'horariosPorGrupo'));
        } catch (\Exception $e) {
            error_log("Error en el proceso de matrícula: " . $e->getMessage());
            (new ErrorController())->internalServerError('Ocurrió un problema al cargar la información de matrícula. Inténtalo más tarde.');
        }
    }

    public function procesar()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SESSION['user_id'])) {
            (new ErrorController())->unauthorized('Debes iniciar sesión para completar la matrícula.');
            return;
        }

        $usuarioId = $_SESSION['user_id'];
        $pagoId = $_POST['pago_id'] ?? null;
        $conceptoId = $_POST['concepto_id'] ?? null;
        $grupoId = $_POST['grupo_id'] ?? null;

        if (!$pagoId || !$conceptoId || !$grupoId) {
            (new ErrorController())->badRequest('Faltan datos obligatorios para procesar la matrícula.');
            return;
        }

        try {
            $pagoAprobado = $this->pago->obtenerPagoAprobadoPorUsuario($usuarioId);
            if (!$pagoAprobado || $pagoAprobado['pago_id'] != $pagoId) {
                (new ErrorController())->forbidden('El pago no es válido o aún no ha sido aprobado.');
                return;
            }

            $grupo = $this->grupo->getGrupoById($grupoId);

            if (!$grupo || ($grupo['cupo_maximo'] !== null && $grupo['cupo_maximo'] <= $this->matricula->getCantidadMatriculados($grupoId))) {
                (new ErrorController())->conflict('El grupo seleccionado ya no tiene cupos disponibles.');
                return;
            }

            $matriculaExistente = $this->matricula->obtenerMatriculaPorUsuarioYConcepto($usuarioId, $conceptoId);
            if ($matriculaExistente) {
                (new ErrorController())->conflict('Ya estás matriculado en este curso.');
                return;
            }

            $matriculaCreada = $this->matricula->crearMatricula($usuarioId, $grupoId, $pagoId, 'confirmado');
            if (!$matriculaCreada) {
                throw new \Exception("Error al registrar la matrícula en la base de datos.");
            }

            $this->grupo->actualizarCupo($grupoId);
            header("Location:" . BASE_URL . "/estudiante/dashboard?success=matricula_success");
            exit;
        } catch (\Exception $e) {
            error_log("Error en el proceso de matrícula: " . $e->getMessage());
            (new ErrorController())->internalServerError('Ocurrió un problema al procesar tu matrícula. Inténtalo más tarde.');
        }
    }
}
