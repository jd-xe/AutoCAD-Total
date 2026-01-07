<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PaymentConcept;
use App\Services\CloudinaryService;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    private CloudinaryService $cloudinary;

    public function __construct(CloudinaryService $cloudinary)
    {
        $this->cloudinary = $cloudinary;
    }

    public function index()
    {
        /** 
         * @var \App\Models\User $user 
         */
        $user = Auth::guard('web')->user();

        $hasEnrollment = $user->enrollments()->where('status', 'confirmed')->exists();

        $concepts = PaymentConcept::query()
            ->when($hasEnrollment, fn($q) => $q->where('type', '!=', 'enrollment'))
            ->get();

        return view('student.partials.payments.index', [
            'concepts' => $concepts,
            'hasEnrollment' => $hasEnrollment
        ]);
    }

    public function create(PaymentConcept $concept)
    {
        /** 
         * @var \App\Models\User $user 
         */
        $user = Auth::user();

        // Sólo permitimos tipo 'enrollment' si no hay matrícula activa
        $hasConfirmed = $user->enrollments()->where('status', 'confirmed')->exists();
        if ($concept->type === 'enrollment' && $hasConfirmed) {
            return redirect()->route('student.dashboard')
                ->with('info', 'Ya tienes una matrícula confirmada.');
        }

        return view('student.partials.payments.upload', compact('concept'));
    }

    public function store(Request $request)
    {
        Log::info('Subiendo comprobante de pago', [
            'request' => $request->all(),
        ]);

        $request->validate([
            'concept_id' => 'required|exists:payment_concepts,id',
            'receipt'    => 'required|image|mimes:jpeg,png,jpg|max:3072',
            'payment_method_id' => 'required|exists:payment_methods,id',
        ]);

        Log::info('Validación de formulario exitosa');

        $user = Auth::user();

        Log::info('Usuario autenticado', [
            'user_id' => $user->id,
        ]);

        // Sube el archivo a Cloudinary y obtiene la URL
        $url = $this->cloudinary->uploadFile(
            $request->file('receipt'),
            "AMISAM/Students/{$user->id}/Receipts"
        );

        Log::info('Archivo subido a Cloudinary', [
            'url' => $url,
        ]);

        if (! $url) {
            Log::error('Error al subir el archivo a Cloudinary', [
                'user_id' => $user->id,
                'file'    => $request->file('receipt')->getClientOriginalName(),
            ]);
            return back()->withErrors(['receipt' => 'Error subiendo el archivo.'])
                ->withInput();
        }
        Log::info('URL del archivo', [
            'url' => $url,
        ]);

        Log::info('Creando el pago', [
            'user_id' => $user->id,
            'concept_id' => $request->input('concept_id'),
            'payment_method_id' => $request->input('payment_method_id'),
        ]);

        // Crear el pago
        $payment = Payment::create([
            'user_id'           => $user->id,
            'concept_id'        => $request->input('concept_id'),
            'payment_method_id' => $request->input('payment_method_id'),
            'amount'            => PaymentConcept::find($request->concept_id)->amount,
            'status'            => 'pending',
            'receipt_url'       => $url,
            'upload_token'      => Str::uuid(),
            'uploaded_at'       => now(),
        ]);

        Log::info('Pago creado', [
            'payment_id' => $payment->id,
            'user_id'    => $user->id,
        ]);
        // Redirige con mensaje
        return redirect()->route('student.dashboard')
            ->with('success', 'Comprobante subido correctamente. Espera la validación.');
    }
}
