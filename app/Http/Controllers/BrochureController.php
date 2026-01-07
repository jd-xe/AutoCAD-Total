<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrochureController extends Controller
{
    private array $allowed = ['basico', 'intermedio', 'avanzado'];
    public function download(string $nivel)
    {
        $nivel = strtolower($nivel);

        // Allowlist: evita path traversal y valores no deseados
        if (!in_array($nivel, $this->allowed, true)) {
            abort(404);
        }

        // Construye la ruta dentro de public (sin concatenaciones peligrosas)
        $filename = "Brochure-{$nivel}.pdf";
        $path = public_path("brochure/{$filename}");
        
        if (!file_exists($path)) {
            $docRoot = rtrim($_SERVER['DOCUMENT_ROOT'] ?? '', DIRECTORY_SEPARATOR);
            if ($docRoot) {
                $alt = $docRoot . DIRECTORY_SEPARATOR . 'brochure' . DIRECTORY_SEPARATOR . $filename;
                if (file_exists($alt)) {
                    $path = $alt;
                }
            }
        }

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->download($path, "Brochure-Curso-AutoCAD-{$nivel}.pdf", [
            'Content-Type' => 'application/pdf'
        ]);
    }
}
