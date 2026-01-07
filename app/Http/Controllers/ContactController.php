<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    // Muestra el formulario
    public function index()
    {
        return view('home.partials.contacto');
    }

    // Procesa el envío
    public function send(Request $request)
    {
        // 1. Validar los datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string',
            'message' => 'required|string|min:10',
        ]);

        // 2. Enviar el correo al administrador
        Mail::to('contacto@autocadtotal.com')->send(new ContactFormMail($validated));

        // 3. Redireccionar con mensaje de éxito (tu layout ya soporta esto)
        return back()->with('contact_success', '¡Mensaje enviado correctamente! Nos pondremos en contacto contigo pronto.');
    }
}