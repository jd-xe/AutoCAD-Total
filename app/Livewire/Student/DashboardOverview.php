<?php

namespace App\Livewire\Student;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardOverview extends Component
{
    public $enrollment;
    public $payment;

    public function mount()
    {
        /**
         * @var User $user
         */
        $user = Auth::user();

        // Trae la matrícula más reciente (completa o no)
        $this->enrollment = $user->enrollments()
            ->with('courseGroup.course', 'payment')
            ->latest()
            ->first();

        // Trae el pago asociado a esa matrícula
        $this->payment = $this->enrollment
            ? $this->enrollment->payment
            : null;
    }

    public function render()
    {
        return view('livewire.student.dashboard-overview');
    }
}
