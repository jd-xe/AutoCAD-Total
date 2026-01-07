<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\CourseGroup;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke(PaymentService $payments)
    {
        $user = Auth::guard('web')->user();

        $payment = $payments->latest()->first();
        #$enrollments = $user->enrollments;

        return view('student.dashboard', compact('user', 'payment'));
    }
}
