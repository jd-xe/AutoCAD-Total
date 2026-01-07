<?php

namespace Jd\Amisam\Core;

class View
{
    public static function render(string $view, array $data = [])
    {
        extract($data);
        $viewPath = __DIR__ . '/../views/' . $view . '.php';
        #$layoutPath = __DIR__ . '/../views/inc/' . $layout . '.php';
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            throw new \Exception("View not found: $view");
        }
    }
}
