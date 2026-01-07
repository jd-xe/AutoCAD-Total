<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseGroup;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;

class GroupStudentController extends Controller
{
    public function index(CourseGroup $group)
    {
        // Carga los estudiantes matriculados en este grupo
        $students = $group->enrollments()
            ->with('user')
            ->where('status', 'confirmed')
            ->get()
            ->pluck('user');

        return view('admin.groups.students', compact('group', 'students'));
    }

    public function move(Request $request, CourseGroup $group, User $user)
    {
        // Validamos nuevo grupo
        $data = $request->validate([
            'new_group_id' => ['required', 'exists:course_groups,id']
        ]);

        // Obtenemos la matrícula confirmada actual
        $enr = Enrollment::where('user_id', $user->id)
            ->where('course_group_id', $group->id)
            ->where('status', 'confirmed')
            ->firstOrFail();

        // Actualizamos al nuevo grupo
        $enr->update([
            'course_group_id' => $data['new_group_id']
        ]);

        return back()->with(
            'success',
            "Estudiante {$user->first_name} {$user->last_name} movido de Grupo #{$group->id} a Grupo #{$data['new_group_id']}."
        );
    }
}
