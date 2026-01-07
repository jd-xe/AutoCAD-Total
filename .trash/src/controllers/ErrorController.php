<?php

namespace Jd\Amisam\Controllers;

use Jd\Amisam\Core\View;

class ErrorController
{
    public function index($title = 'Error', $message = 'Ocurrió un error inesperado.', $code = 520)
    {
        http_response_code($code);
        View::render('error/error', [
            'code' => $code,
            'title' => $title,
            'message' => $message,
            'class' => 'text-danger'
        ]);
    }

    public function badRequest($message = 'La solicitud no se pudo procesar debido a datos inválidos o incompletos.')
    {
        http_response_code(400);
        View::render('error/error', [
            'code' => 400,
            'title' => 'Solicitud incorrecta',
            'message' => $message,
            'class' => 'text-warning'
        ]);
    }

    public function unauthorized($message = 'Debes iniciar sesión para acceder a esta página.')
    {
        http_response_code(401);
        View::render('error/error', [
            'code' => 401,
            'title' => 'No Autorizado',
            'message' => $message,
            'class' => 'text-danger'
        ]);
    }

    public function forbidden($message = 'No tienes permiso para acceder a esta página.')
    {
        http_response_code(403);
        View::render('error/error', [
            'code' => 403,
            'title' => 'Acceso Denegado',
            'message' => $message,
            'class' => 'text-danger'
        ]);
    }

    public function notFound($message = 'Lo sentimos, la página que buscas no existe.')
    {
        http_response_code(404);
        View::render('error/error', [
            'code' => 404,
            'title' => 'Página no encontrada',
            'message' => $message,
            'class' => 'text-warning'
        ]);
    }

    public function methodNotAllowed($message = 'El método de solicitud no está permitido para este recurso.')
    {
        http_response_code(405);
        View::render('error/error', [
            'code' => 405,
            'title' => 'Método no permitido',
            'message' => $message,
            'class' => 'text-warning'
        ]);
    }

    public function conflict($message = 'La solicitud no pudo completarse debido a un conflicto con el estado actual del recurso.')
    {
        http_response_code(409);
        View::render('error/error', [
            'code' => 409,
            'title' => 'Conflicto',
            'message' => $message,
            'class' => 'text-warning'
        ]);
    }


    public function internalServerError($message = 'Ha ocurrido un error inesperado. Por favor, intenta más tarde.')
    {
        http_response_code(500);
        View::render('error/error', [
            'code' => 500,
            'title' => 'Error del Servidor',
            'message' => $message,
            'class' => 'text-danger'
        ]);
    }

    public function serviceUnavailable($message = 'El servicio no está disponible en este momento. Inténtalo más tarde.')
    {
        http_response_code(503);
        View::render('error/error', [
            'code' => 503,
            'title' => 'Servicio no disponible',
            'message' => $message,
            'class' => 'text-warning'
        ]);
    }
}
