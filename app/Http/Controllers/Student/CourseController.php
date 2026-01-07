<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        /**
         * @var User $user
         */
        $user = Auth::guard('web')->user();

        $enrollments = $user->enrollments()
            ->whereIn('status', ['confirmed', 'completed'])
            ->with(['courseGroup.course', 'courseGroup.schedules', 'courseGroup.resources'])
            ->orderByDesc('enrollment_date')
            ->get();

        return view('student.partials.courses.index', compact('enrollments'));
    }
}
