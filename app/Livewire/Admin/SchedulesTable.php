<?php

namespace App\Livewire\Admin;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Livewire\Component;

class SchedulesTable extends Component
{
    public $schedules;
    public $day, $start_time, $end_time;
    public $scheduleId, $modalMode = '';

    protected function rules()
    {
        $rules = [
            'day' => ['required', Rule::in([
                'Lunes',
                'Martes',
                'Miércoles',
                'Jueves',
                'Viernes',
                'Sábado',
                'Domingo'
            ])],
        ];

        if ($this->modalMode === 'create') {
            // en creación ambos son obligatorios
            $rules['start_time'] = ['required', 'date_format:H:i'];
            $rules['end_time']   = ['required', 'date_format:H:i', 'after:start_time'];
        } else {
            // en edición, PERMITIMOS nulo y sólo validamos formato si viene algo
            $rules['start_time'] = ['nullable', 'date_format:H:i'];
            // 'after' sólo aplica si se envía end_time no nulo
            $rules['end_time']   = ['nullable', 'date_format:H:i', 'after:start_time'];
        }

        return $rules;
    }


    public function mount()
    {
        $this->loadSchedules();
    }

    public function loadSchedules()
    {
        $this->schedules = Schedule::orderByRaw("FIELD(day,'Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo')")
            ->orderBy('start_time')
            ->get();
    }

    public function showCreateModal()
    {
        $this->resetForm();
        $this->modalMode = 'create';
        $this->dispatch('show-schedule-modal');
    }

    public function showEditModal($id)
    {
        $s = Schedule::findOrFail($id);
        $this->scheduleId = $id;
        $this->day        = $s->day;
        $this->start_time = Carbon::parse($s->start_time)->format('H:i');
        $this->end_time   = Carbon::parse($s->end_time)->format('H:i');
        $this->modalMode = 'edit';
        $this->dispatch('show-schedule-modal');
    }

    public function saveSchedule()
    {
        $this->validate();

        $data = [
            'day'        => $this->day,
            'start_time' => $this->start_time,
            'end_time'  => $this->end_time,
        ];

        if ($this->modalMode === 'create') {
            Schedule::create($data);
            session()->flash('success', 'Horario creado.');
        } else {
            Schedule::findOrFail($this->scheduleId)->update($data);
            session()->flash('success', 'Horario actualizado.');
        }

        $this->dispatch('hide-schedule-modal');
        $this->loadSchedules();
        $this->resetForm();
    }

    public function deleteSchedule($id)
    {
        Schedule::findOrFail($id)->delete();
        session()->flash('success', 'Horario eliminado.');
        $this->loadSchedules();
    }

    private function resetForm()
    {
        $this->reset(['day', 'start_time', 'end_time', 'scheduleId']);
    }

    public function render()
    {
        return view('livewire.admin.schedules-table');
    }
}
