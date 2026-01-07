<?php

namespace Jd\Amisam\controllers\estudiante;

use Jd\Amisam\Middlewares\Middleware;
use Jd\Amisam\Models\Horario;

class HorarioController
{
    private $horario;

    public function __construct()
    {
        Middleware::checkRole(['estudiante']);
        $this->horario = new Horario();
    }
}
