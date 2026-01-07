<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_group_id',
        'evaluation_type',
        'score',
        'comments',
    ];

    /**
     * Tipos de evaluación permitidos
     */
    public static function evaluationTypes(): array
    {
        return [
            'final' => 'Nota Final',
            'parcial' => 'Examen Parcial',
            'practica' => 'Práctica Calificada',
            // Puedes añadir más según necesidades
        ];
    }

    // Relación al estudiante
    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación al grupo del curso
    public function courseGroup()
    {
        return $this->belongsTo(CourseGroup::class);
    }
}
