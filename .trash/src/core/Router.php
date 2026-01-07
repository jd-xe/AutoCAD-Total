<?php

namespace Jd\Amisam\Core;

use Jd\Amisam\Controllers\ErrorController;

class Router
{
    public function handleRequest()
    {
        session_start();
        
        #echo "<pre>";
        #var_dump($_SERVER['REQUEST_URI']);
        #echo "</pre>";
        #exit;

        $route = $_SERVER['REQUEST_URI'] ?? '/';
        $route = strtok($route, '?'); // Eliminar parámetros GET
        $route = trim($route, '/');

        if ($route === '' || $route === 'index.php') {
            $route = 'home';
        }

        $segments = explode('/', $route);
        $namespace = 'Jd\\Amisam\\Controllers';

        // 📌 Si el primer segmento es "dashboard", asumimos que es un controlador dentro de "Admin"
        /*if ($segments[0] === 'dashboard') {
            $namespace .= '\\Admin';
            array_shift($segments); // Eliminamos "dashboard" del array
        }*/

        $module = null;
        if (in_array($segments[0], ['admin', 'estudiante'])) {
            $module = ucfirst($segments[0]);
            $namespace .= '\\' . $module;
            array_shift($segments);
        }

        $controllerName = ucfirst($segments[0] ?? 'Dashboard') . 'Controller';
        $controllerClass = $namespace . '\\' . $controllerName;
        $action = $segments[1] ?? 'index';

        if (!class_exists($controllerClass)) {
            $this->handleError("Controlador '$controllerClass' no encontrado");
        }


        
        $controller = new $controllerClass();

        if (!method_exists($controller, $action)) {
            $this->handleError("Método '$action' no encontrado en '$controllerClass'");
        }
        #echo "<pre>";
        #var_dump($route, $controllerClass, $action);
        #echo "</pre>";
        #exit;
        
        
        #echo "<pre>";
        #var_dump($controllerClass, method_exists($controller, $action));
        #echo "</pre>";
        #exit;
        
        $controller->$action();
    }

    private function handleError($message)
    {
        http_response_code(404);
        echo "<h1>Error 404</h1><p>$message</p>";
        exit;
    }
}
