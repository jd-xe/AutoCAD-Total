<?php

namespace App\Livewire\Admin;

use App\Models\Course;
use Livewire\Component;

class CoursesTable extends Component
{
    public $courses;
    public $name, $description, $duration, $status;
    public $courseId;
    public $modalMode = '';

    protected $rules = [
        'name'        => 'required|string|max:150|unique:courses,name',
        'description' => 'nullable|string',
        'duration'    => 'required|integer|min:1',
        'status'      => 'required|in:active,inactive',
    ];

    public function mount()
    {
        $this->loadCourses();
    }

    public function loadCourses()
    {
        $this->courses = Course::orderBy('name')->get();
    }

    public function showCreateModal()
    {
        $this->resetForm();
        $this->modalMode = 'create';
        $this->dispatch('show-course-modal');
    }

    public function showEditModal($id)
    {
        $course = Course::findOrFail($id);
        $this->courseId    = $course->id;
        $this->name        = $course->name;
        $this->description = $course->description;
        $this->duration    = $course->duration;
        $this->status      = $course->status;

        // Ajustar regla unique para edit
        $this->rules['name'] = 'required|string|max:150|unique:courses,name,' . $id;

        $this->modalMode = 'edit';
        $this->dispatch('show-course-modal');
    }

    public function saveCourse()
    {
        $this->validate();

        if ($this->modalMode === 'create') {
            Course::create([
                'name'        => $this->name,
                'description' => $this->description,
                'duration'    => $this->duration,
                'status'      => $this->status,
            ]);
            session()->flash('success', 'Curso creado.');
        } else {
            $course = Course::findOrFail($this->courseId);
            $course->update([
                'name'        => $this->name,
                'description' => $this->description,
                'duration'    => $this->duration,
                'status'      => $this->status,
            ]);
            session()->flash('success', 'Curso actualizado.');
        }

        $this->dispatch('hide-course-modal');
        $this->loadCourses();
        $this->resetForm();
    }

    public function deleteCourse($id)
    {
        Course::findOrFail($id)->delete();
        session()->flash('success', 'Curso eliminado.');
        $this->loadCourses();
    }

    private function resetForm()
    {
        $this->reset(['name', 'description', 'duration', 'status', 'courseId']);
        $this->rules['name'] = 'required|string|max:150|unique:courses,name';
    }

    public function render()
    {
        return view('livewire.admin.courses-table');
    }
}
