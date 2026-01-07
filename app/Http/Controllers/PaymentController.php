<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PaymentConcept; // Importamos tu modelo
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        // Usamos Eloquent para obtener los cursos.
        // Asumimos que los cursos son los que tienen un course_id asignado.
        // También podrías usar ->where('type', 'enrollment') si prefieres filtrar por tipo.
        $courses = PaymentConcept::whereNotNull('course_id')
                    ->get();

        return view('home.partials.pagos', compact('courses'));
    }
}