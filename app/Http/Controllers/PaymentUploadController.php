<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use App\Services\CloudinaryService;
use Illuminate\Http\Request;

class PaymentUploadController extends Controller
{
    protected $cloudinaryService;

    public function __construct(CloudinaryService $cloudinaryService)
    {
        $this->cloudinaryService = $cloudinaryService;
    }
    public function showForm(string $token)
    {
        if (!$token) {
            abort(404, 'Token inválido.');
        }

        $payment = Payment::where('upload_token', $token)->firstOrFail();

        if ($payment->uploaded_at || $payment->status === 'approved') {
            return redirect()->route('home')->with('info', 'Ya has subido tu comprobante o tu pago fue aprobado.');
        }

        return view('payment.upload', compact('payment'));
    }

    public function submitForm(Request $request, string $token)
    {
        $payment = Payment::where('upload_token', $token)->firstOrFail();

        if ($payment->uploaded_at || $payment->status === 'approved') {
            return redirect()->route('home')->with('info', 'Ya has subido tu comprobante.');
        }

        $request->validate([
            'receipt' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $studentId = $payment->user_id;
        $folder = "AMISAM/Students/{$studentId}/Receipts";
        $receiptUrl = $this->cloudinaryService->uploadFile($request->file('receipt'), $folder);

        $payment->update([
            'payment_date' => now(),
            'receipt_url' => $receiptUrl,
            'status' => 'verification',
        ]);

        return redirect()->route('home')->with('success', 'El comprobante se ha subido correctamente.');
    }
}
