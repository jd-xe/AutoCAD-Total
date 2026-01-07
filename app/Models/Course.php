<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'duration',
        'status',
    ];

    protected $casts = [
        'duration' => 'integer',
    ];

    /**
     * Relación 1:N: Un curso puede tener muchos grupos.
     */
    public function courseGroups()
    {
        return $this->hasMany(CourseGroup::class, 'course_id');
    }
}
