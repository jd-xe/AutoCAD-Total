<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_group_id',
        'payment_id',
        'status',
        'completed_at',
        'comment',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    /**
     * Relación: La inscripción pertenece a un usuario (estudiante).
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relación: La inscripción pertenece a un grupo de curso.
     */
    public function courseGroup()
    {
        return $this->belongsTo(CourseGroup::class, 'course_group_id');
    }

    /**
     * Relación: La inscripción pertenece a un pago.
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    /**
     * (Opcional) Relación 1:N: Una inscripción podría tener varios documentos asociados.
     */
    public function documents()
    {
        return $this->hasMany(Document::class, 'enrollment_id');
    }
}
