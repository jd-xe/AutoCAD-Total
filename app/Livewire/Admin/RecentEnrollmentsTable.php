<?php

namespace App\Livewire\Admin;

use App\Models\Enrollment;
use Livewire\Component;

class RecentEnrollmentsTable extends Component
{
    public $recent;

    public function mount(int $limit = 5)
    {
        $this->recent = Enrollment::with('user', 'courseGroup.course')
            ->latest()
            ->take($limit)
            ->get();
    }
    public function render()
    {
        return view('livewire.admin.recent-enrollments-table');
    }
}
