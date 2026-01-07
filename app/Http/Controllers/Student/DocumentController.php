<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Traemos todos los documentos del usuario, con su grupo y tipo
        $documents = Document::with('courseGroup.course')
            ->where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->get();

        return view('student.partials.documents.index', compact('documents'));
    }
}
