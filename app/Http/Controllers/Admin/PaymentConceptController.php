<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentConceptController extends Controller
{
    /**
     * Muestra la lista de conceptos de pago (con Livewire).
     */
    public function index()
    {
        return view('admin.concepts.index');
    }
}
