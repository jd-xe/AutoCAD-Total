<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentConcept extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'type',
        'course_id',
        'description',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    /**
     * Relación 1:N: Un payment concept puede estar asociado a varios pagos.
     */
    public function payments()
    {
        return $this->hasMany(Payment::class, 'concept_id');
    }
}
