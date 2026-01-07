<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Relación 1:N: Un método de pago se puede asociar a varios pagos.
     */
    public function payments()
    {
        return $this->hasMany(Payment::class, 'payment_method_id');
    }
}
