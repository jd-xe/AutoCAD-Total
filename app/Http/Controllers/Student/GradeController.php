<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    public function index()
    {
        /**
         * @var \App\Models\User $user
         */
        $user = Auth::user();

        // Carga todas las notas del estudiante, con su grupo y curso
        $grades = $user->grades()
            ->with('courseGroup.course')
            ->orderByDesc('created_at')
            ->get();

        return view('student.partials.grades.index', compact('grades'));
    }
}
