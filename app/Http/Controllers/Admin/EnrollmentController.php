<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        return view('admin.enrollments.index');
    }

    public function show($id)
    {
        return view('admin.enrollments.show', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Lógica para cambiar status: cancel/confirm/reopen
        // ...
        return back()->with('success', 'Estado de matrícula actualizado.');
    }
}
