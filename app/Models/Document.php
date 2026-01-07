<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_group_id',
        'enrollment_id',
        'type',
        'status',
        'document_url',
        'validation_code',
    ];
    
    /**
     * 🔹 Generar automáticamente un código de validación único.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($document) {
            if (empty($document->validation_code)) {
                $document->validation_code = bin2hex(random_bytes(16)); // 32 caracteres hexadecimales
            }
        });
    }
    /**
     * Relación: El documento pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relación: El documento pertenece a un grupo de curso.
     */
    public function courseGroup()
    {
        return $this->belongsTo(CourseGroup::class, 'course_group_id');
    }

    /**
     * (Opcional) Relación: El documento se asocia a una inscripción.
     */
    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class, 'enrollment_id');
    }
}
