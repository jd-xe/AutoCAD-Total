<?php

namespace App\Livewire\Admin;

use App\Models\Course;
use App\Models\CourseGroup;
use App\Models\Document;
use App\Models\Payment;
use App\Models\User;
use Livewire\Component;

class StatsCard extends Component
{
    public $type;
    public $count;
    public $title;
    public $bgClass;

    public function mount(string $type)
    {
        $this->type = $type;

        // Configuración según tipo
        switch ($type) {
            case 'students':
                $this->title   = 'Estudiantes';
                $this->count   = User::whereHas('roles', fn($q) => $q->where('name', 'student'))->count();
                $this->bgClass = 'bg-primary';
                break;
            case 'courses':
                $this->title   = 'Cursos';
                $this->count   = Course::count();
                $this->bgClass = 'bg-success';
                break;
            case 'groups':
                $this->title   = 'Grupos';
                $this->count   = CourseGroup::count();
                $this->bgClass = 'bg-info';
                break;
            case 'payments':
                $this->title   = 'Pagos Pendientes';
                $this->count   = Payment::where('status', 'pending')->count();
                $this->bgClass = 'bg-warning';
                break;
            case 'approved_payments':
                $this->title   = 'Pagos Aprobados';
                $this->count   = Payment::where('status', 'approved')->count();
                $this->bgClass = 'bg-danger';
                break;
            case 'documents':
                $this->title   = 'Docs Pendientes';
                $this->count   = Document::where('status', 'pending')->count();
                $this->bgClass = 'bg-secondary';
                break;
            default:
                throw new \Exception("Tipo de estadística desconocido: {$type}");
        }
    }

    public function render()
    {
        return view('livewire.admin.stats-card');
    }
}
