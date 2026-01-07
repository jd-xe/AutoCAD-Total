<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\EnrollmentService;
use App\Services\PasswordResetService;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    private PaymentService $paymentService;
    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function index(Request $request)
    {
        $validated = $request->validate([
            'type' => ['nullable', 'string'],
            'status' => ['nullable', 'string'],
            'date_from' => ['nullable', 'date'],
            'date_to' => ['nullable', 'date'],
        ]);

        $payments = $this->paymentService->paginate($validated, 10);
        return view('admin.payments.index', compact('payments'));
    }

    public function approvePayment(int $paymentId)
    {
        try {
            Log::info("Iniciando aprobación del pago con ID: {$paymentId}");
            $this->paymentService->approvePaymentAndHandleEnrollment($paymentId);
            Log::info("Pago aprobado y proceso de inscripción completado para ID: {$paymentId}");
            return back()->with('success', 'Pago aprobado exitosamente.');
        } catch (\InvalidArgumentException $th) {
            Log::error("Error al aprobar pago ID {$paymentId}: " . $th->getMessage());
            return back()->with('error', 'Error: ' . $th->getMessage());
        }
    }

    public function rejectPayment(int $id)
    {
        try {
            $this->paymentService->reject($id);
            return back()->with('success', 'Pago rechazado exitosamente.');
        } catch (\InvalidArgumentException $th) {
            return back()->with('error', 'Error al rechazar el pago: ' . $th->getMessage());
        }
    }
}
