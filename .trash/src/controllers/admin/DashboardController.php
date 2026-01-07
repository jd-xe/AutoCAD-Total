<?php

namespace Jd\Amisam\Controllers\Admin;

use Jd\Amisam\Core\View;
use Jd\Amisam\Middlewares\Middleware;
use Jd\Amisam\Models\Pago;
use Jd\Amisam\Models\User;

class DashboardController
{
    private $user;
    private $pago;
    public function __construct()
    {
        Middleware::checkRole(['administrador']);
        $this->user = new User();
        $this->pago = new Pago();
    }
    public function index()
    {
        $totalUsuarios = $this->user->countActiveUsers();
        #$totalPagos = $this->pago->obtenerTotalPagos();

        View::render('admin/dashboard', [
            'totalUsuarios' => $totalUsuarios,
            #'totalPagos' => $totalPagos
        ]);
    }

    public function usuarios()
    {
        (new UsuarioController())->listar();
    }
    public function pagos()
    {
        (new PagoController())->listar();
    }
}
