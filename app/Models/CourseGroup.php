<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'teacher_id',
        'start_date',
        'end_date',
        'max_capacity',
        'status',
    ];

    protected $casts = [
        'start_date'   => 'date',
        'end_date'     => 'date',
        'max_capacity' => 'integer',
    ];

    /**
     * Relación: Pertenece a un curso.
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    /**
     * Relación: Pertenece a un usuario que actúa como docente.
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    /**
     * Relación: Un grupo de curso tiene asignados muchos horarios (pivot/intermedio).
     */
    public function groupSchedules()
    {
        return $this->hasMany(GroupSchedule::class, 'course_group_id');
    }

    public function schedules()
    {
        return $this->belongsToMany(Schedule::class, 'group_schedules', 'course_group_id', 'schedule_id');
    }

    /**
     * Relación: Un grupo de curso puede tener varias inscripciones.
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'course_group_id');
    }

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }
}
