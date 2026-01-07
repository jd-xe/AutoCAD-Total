<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'concept_id',
        'payment_method_id',
        'amount',
        'payment_date',
        'status',
        'receipt_url',
        'upload_token',
        'uploaded_at',
    ];

    protected $casts = [
        'amount'       => 'decimal:2',
        'payment_date' => 'datetime',
    ];

    /**
     * Relación: El pago pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relación: El pago pertenece a un concepto de pago.
     */
    public function concept()
    {
        return $this->belongsTo(PaymentConcept::class, 'concept_id');
    }

    /**
     * Relación: El pago utiliza un método de pago.
     */
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    /**
     * Relación 1:1: Un pago se asocia a una inscripción.
     */
    public function enrollment()
    {
        return $this->hasOne(Enrollment::class, 'payment_id');
    }
}
