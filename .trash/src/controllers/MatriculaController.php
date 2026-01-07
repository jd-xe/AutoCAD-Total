<?php

namespace App\Controllers;

use Jd\Amisam\Models\Grupo;
use Jd\Amisam\Models\Matricula;

class MatriculaController
{
    private $matricula;
    private $grupo;

    public function __construct()
    {
        $this->matricula = new Matricula();
        $this->grupo = new Grupo();
    }
}
