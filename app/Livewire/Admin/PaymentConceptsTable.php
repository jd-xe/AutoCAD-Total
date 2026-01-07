<?php

namespace App\Livewire\Admin;

use App\Models\Course;
use App\Models\PaymentConcept;
use Livewire\Component;

class PaymentConceptsTable extends Component
{
    public $concepts;
    public $name;
    public $amount;
    public $type;
    public $course_id;
    public $conceptId;     // para editar
    public $modalMode = ''; // 'create' o 'edit'

    protected function rules()
    {
        return [
            'name'      => 'required|string|unique:payment_concepts,name,' . ($this->conceptId ?: 'NULL') . ',id',
            'amount'    => 'required|numeric|min:0',
            'type'      => 'required|in:enrollment,document,other',
            'course_id' => 'nullable|exists:courses,id',
        ];
    }

    public function mount()
    {
        $this->loadConcepts();
    }

    public function loadConcepts()
    {
        $this->concepts = PaymentConcept::orderBy('type')->orderBy('name')->get();
    }

    public function showCreateModal()
    {
        $this->resetForm();
        $this->modalMode = 'create';
        $this->dispatch('show-concept-modal');
    }

    public function showEditModal($id)
    {
        $concept = PaymentConcept::findOrFail($id);

        $this->conceptId = $id;
        $this->name      = $concept->name;
        $this->amount    = $concept->amount;
        $this->type      = $concept->type;
        $this->course_id  = $concept->course_id;

        $this->modalMode = 'edit';
        $this->dispatch('show-concept-modal');
    }

    public function saveConcept()
    {
        $this->validate();

        $data = [
            'name'      => $this->name,
            'amount'    => $this->amount,
            'type'      => $this->type,
            'course_id' => $this->course_id,
        ];

        if ($this->modalMode === 'create') {
            PaymentConcept::create($data);
            session()->flash('success', 'Concepto creado correctamente.');
        } else {
            PaymentConcept::findOrFail($this->conceptId)->update($data);
            session()->flash('success', 'Concepto actualizado correctamente.');
        }

        $this->dispatch('hide-concept-modal');
        $this->loadConcepts();
        $this->resetForm();
    }

    public function deleteConcept($id)
    {
        PaymentConcept::findOrFail($id)->delete();
        session()->flash('success', 'Concepto eliminado.');
        $this->loadConcepts();
    }

    private function resetForm()
    {
        $this->reset(['name', 'amount', 'type', 'course_id', 'conceptId']);
    }

    public function render()
    {
        $courses = Course::orderBy('name')->get();
        return view('livewire.admin.payment-concepts-table', compact('courses'));
    }
}
