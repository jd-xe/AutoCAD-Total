<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'start_time',
        'end_time',
    ];

    /**
     * Relación: Un horario puede estar asignado a muchas asignaciones de grupo (group schedules).
     */
    public function groupSchedules()
    {
        return $this->hasMany(GroupSchedule::class, 'schedule_id');
    }
}
