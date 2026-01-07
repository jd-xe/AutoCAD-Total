<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'resources';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_group_id',
        'name',
        'description',
        'file_url',
        'type',
    ];

    /**
     * Define the relationship with the CourseGroup model.
     */
    public function courseGroup()
    {
        return $this->belongsTo(CourseGroup::class);
    }
}
