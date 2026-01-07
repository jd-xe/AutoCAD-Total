<?php

namespace App\Livewire\Admin;

use App\Models\Course;
use App\Models\CourseGroup;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class CourseGroupsTable extends Component
{
    use WithPagination;

    public $course_id, $teacher_id, $start_date, $end_date, $max_capacity, $status;
    public $groupId, $modalMode = '';

    public $schedules;
    public $selectedSchedules = [];
    public $filterCourse   = '';
    public $filterTeacher  = '';
    public $filterStart    = '';
    public $filterEnd      = '';
    public $filterStatus   = '';

    public $courses, $teachers;

    protected $queryString = [
        'filterCourse'  => ['except' => ''],
        'filterTeacher' => ['except' => ''],
        'filterStart'   => ['except' => ''],
        'filterEnd'     => ['except' => ''],
        'filterStatus'  => ['except' => ''],
        'page'          => ['except' => 1],
    ];

    protected function rules()
    {
        return [
            'course_id'    => ['required', Rule::exists('courses', 'id')],
            'teacher_id'   => ['required', Rule::exists('users', 'id')],
            'start_date'   => 'required|date',
            'end_date'     => 'required|date|after_or_equal:start_date',
            'max_capacity' => 'nullable|integer|min:1',
            'status'       => 'required|in:active,closed',
            'selectedSchedules' => 'nullable|array',
            'selectedSchedules.*' => ['integer', Rule::exists('schedules', 'id')],
        ];
    }

    public function mount()
    {
        $this->loadSelectData();
    }

    protected function loadSelectData()
    {
        // Cursos activos
        $this->courses  = Course::where('status', 'active')->get();
        // Docentes: asumo rol 'teacher'
        $this->teachers = User::whereHas('roles', fn($q) => $q->where('name', 'teacher'))->get();
        $this->schedules  = Schedule::orderByRaw("FIELD(day,'Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo')")
            ->orderBy('start_time')
            ->get();
    }

    public function applyFilters()
    {
        $this->resetPage();
    }

    public function showCreateModal()
    {
        $this->resetForm();
        $this->modalMode = 'create';
        $this->dispatch('show-group-modal');
    }

    public function showEditModal($id)
    {
        $group = CourseGroup::findOrFail($id);
        $this->selectedSchedules = $group->schedules->pluck('id')->toArray();

        $this->groupId      = $id;
        $this->course_id    = $group->course_id;
        $this->teacher_id   = $group->teacher_id;
        $this->start_date   = $group->start_date;
        $this->end_date     = $group->end_date;
        $this->max_capacity = $group->max_capacity;
        $this->status       = $group->status;

        $this->modalMode = 'edit';
        $this->dispatch('show-group-modal');
    }

    public function saveGroup()
    {
        $this->validate();

        $data = [
            'course_id'    => $this->course_id,
            'teacher_id'   => $this->teacher_id,
            'start_date'   => $this->start_date,
            'end_date'     => $this->end_date,
            'max_capacity' => $this->max_capacity,
            'status'       => $this->status,
        ];

        if ($this->modalMode === 'create') {
            $g = CourseGroup::create($data);
            session()->flash('success', 'Grupo creado.');
        } else {
            $g = CourseGroup::findOrFail($this->groupId);
            $g->update($data);
            session()->flash('success', 'Grupo actualizado.');
        }

        $g->schedules()->sync($this->selectedSchedules);
        $this->dispatch('hide-group-modal');
        $this->resetForm();
    }

    public function deleteGroup($id)
    {
        CourseGroup::findOrFail($id)->delete();
        session()->flash('success', 'Grupo eliminado.');
        $this->resetPage();
    }

    private function resetForm()
    {
        $this->reset([
            'course_id',
            'teacher_id',
            'start_date',
            'end_date',
            'max_capacity',
            'status',
            'groupId',
            'modalMode',
            'selectedSchedules'
        ]);
    }

    public function resetFilters()
    {
        $this->reset([
            'filterCourse',
            'filterTeacher',
            'filterStart',
            'filterEnd',
            'filterStatus',
        ]);

        $this->resetPage();
    }

    public function render()
    {
        Paginator::useBootstrapFive();
        $query = CourseGroup::with(['course', 'teacher'])
            ->withCount('enrollments')
            // Por defecto oculto closed, a menos que el filtro sea closed o all
            ->when(!in_array($this->filterStatus, ['closed', 'all']), fn($q) => $q->where('status', 'active'))
            ->when($this->filterStatus === 'closed', fn($q) => $q->where('status', 'closed'))
            // Filtros:
            ->when($this->filterCourse, fn($q) => $q->where('course_id', $this->filterCourse))
            ->when($this->filterTeacher, fn($q) => $q->where('teacher_id', $this->filterTeacher))
            ->when($this->filterStart, fn($q) => $q->whereDate('start_date', '>=', $this->filterStart))
            ->when($this->filterEnd, fn($q)   => $q->whereDate('start_date', '<=', $this->filterEnd));

        $groups = $query->orderBy('start_date', 'desc')
            ->paginate(5);

        return view('livewire.admin.course-groups-table', compact('groups'));
    }
}
