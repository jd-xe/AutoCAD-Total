<?php

namespace Jd\Amisam\Middlewares;

use Jd\Amisam\Controllers\ErrorController;

class Middleware
{
    public static function checkRole(array $allowedRoles)
    {
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['rol'])) {
            (new ErrorController)->unauthorized();
            exit;
        }

        if (!in_array($_SESSION['rol'], $allowedRoles)) {
            (new ErrorController)->forbidden();
            exit;
        }
    }
}
