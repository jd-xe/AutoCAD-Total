<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\CourseGroup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function index()
    {
        /**
         * @var User $user
         */
        $user = Auth::guard('web')->user();
        $enrollment = $user
            ->enrollments()
            #->whereNull('course_group_id')
            ->whereHas('payment', fn($q) => $q->where('status', 'approved'))
            ->latest()
            ->first();
        #->firstOrFail();

        if (!$enrollment) {
            return view('student.partials.enrollments.select-group', [
                'groups' => collect(), // colección vacía
                'notice' => 'Aún no has realizado un pago aprobado. Por favor, realiza el pago para continuar con la matrícula.'
            ]);
        }

        if ($enrollment->course_group_id && $enrollment->status === 'confirmed') {
            return view('student.partials.enrollments.select-group', [
                'groups' => collect(),
                'notice' => 'Ya tienes una matrícula activa. Si necesitas ayuda, contacta con soporte.'
            ]);
        }

        // 2) Determinar el curso: suponemos que tu tabla payment_concepts tiene course_id
        $courseId = $enrollment->payment->concept->course_id;

        // 3) Recuperar grupos activos de ese curso, con conteo de inscritos
        $groups = CourseGroup::where('course_id', $courseId)
            ->where('status', 'active')
            ->withCount('enrollments')
            ->get();

        return view('student.partials.enrollments.select-group', compact('groups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'group_id' => 'required|exists:course_groups,id'
        ]);

        /**
         * @var User $user
         */
        $user = Auth::guard('web')->user();

        $enrollment = $user
            ->enrollments()
            ->whereNull('course_group_id')
            ->latest()
            ->firstOrFail();

        // 4) Asignamos el grupo y confirmamos
        $enrollment->update([
            'course_group_id' => $request->group_id,
            'status'          => 'confirmed',
            'enrollment_date' => now()->toDateString(),
        ]);

        return redirect()->route('student.dashboard')
            ->with('success', '¡Tu matrícula ha sido completada!');
    }
}
