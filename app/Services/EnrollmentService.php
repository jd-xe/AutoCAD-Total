<?php

namespace App\Services;

use App\Models\CourseGroup;
use App\Models\Enrollment;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;

class EnrollmentService
{
    /**
     * Constructor del servicio
     */
    public function __construct()
    {
        // Constructor logic here
    }

    /**
     * Ejemplo de método del servicio
     */
    public function createFromPayment(Payment $payment)
    {
        Log::info("Creando matrícula para el usuario ID {$payment->user_id} con pago ID {$payment->id}");
        return Enrollment::create([
            'user_id' => $payment->user_id,
            'payment_id' => $payment->id,
            'status' => 'pending',
        ]);
    }

    public function availableGroupsForUser($user)
    {
        $payment = $user->authentication->payment;
        return CourseGroup::where('course_id', $payment->concept->course_id)
            ->where('status', 'active')
            ->get();
    }

    public function enroll($user, $groupId)
    {
        $payment = $user->authentication->payment;
        return Enrollment::create([
            'user_id' => $user->id,
            'course_group_id' => $groupId,
            'payment_id' => $payment->id,
            'status' => 'confirmed',
        ]);
    }
}
