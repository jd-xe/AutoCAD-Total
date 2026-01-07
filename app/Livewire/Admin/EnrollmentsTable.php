<?php

namespace App\Livewire\Admin;

use App\Models\Enrollment;
use Livewire\Component;

class EnrollmentsTable extends Component
{
    public $enrollments;

    public function mount()
    {
        $this->enrollments = Enrollment::with('user', 'courseGroup.course')
            ->orderByDesc('created_at')
            ->get();
    }

    public function changeStatus($id, $newStatus)
    {
        $enr = Enrollment::findOrFail($id);
        $enr->update(['status' => $newStatus]);
        session()->flash('success', "Matrícula #{$id} ahora está “{$newStatus}”.");
        $this->mount(); // recarga la lista
    }

    public function render()
    {
        return view('livewire.admin.enrollments-table');
    }
}
