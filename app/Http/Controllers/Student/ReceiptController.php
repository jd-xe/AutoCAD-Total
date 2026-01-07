<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Services\CloudinaryService;
use App\Services\ReceiptService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReceiptController extends Controller
{
    public function index()
    {
        return view('student.partials.receipts.index');
    }
    public function upload(Request $request, ReceiptService $receiptService)
    {
        $request->validate([
            'receipt' => 'required|file|mimes:jpg,png,jpeg'
        ]);

        try {
            $user = Auth::guard('web')->user();
            $success = $receiptService->uploadStudentReceipt($user, $request->file('receipt'));

            if (!$success) {
                return back()->with('info', 'Ya has subido un comprobante o tu pago fue aprobado.');
            }

            return back()->with('success', 'Comprobante subido correctamente.');
        } catch (\Exception $e) {
            Log::error('Error al subir comprobante: ' . $e->getMessage());
            return back()->withErrors(['receipt' => 'Hubo un problema al subir tu comprobante. Intenta nuevamente.']);
        }
    }
}
