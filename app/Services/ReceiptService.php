<?php

namespace App\Services;

class ReceiptService
{
    /**
     * Constructor del servicio
     */
    private CloudinaryService $cloudinary;
    public function __construct(CloudinaryService $cloudinary)
    {
        $this->$cloudinary = $cloudinary;
    }

    /**
     * Ejemplo de método del servicio
     */
    public function uploadStudentReceipt($user, $file): bool
    {
        $payment = $user->payments;

        if (!$payment || $payment->status === 'approved' || $payment->receipt_url) {
            return false; // Ya subido o aprobado
        }

        $studentId = $user->id;
        $folder = "AMISAM/Students/{$studentId}/Receipts";

        $receiptUrl = $this->cloudinary->uploadFile($file, $folder);

        if (!$receiptUrl) {
            throw new \Exception('No se pudo subir el comprobante a Cloudinary.');
        }

        $payment->update([
            'receipt_url' => $receiptUrl,
            'payment_date' => now(),
            'status' => 'verification',
        ]);

        return true;
    }
}
