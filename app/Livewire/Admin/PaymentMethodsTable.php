<?php

namespace App\Livewire\Admin;

use App\Models\PaymentMethod;
use Livewire\Component;

class PaymentMethodsTable extends Component
{
    public $methods;
    public $name;
    public $methodId;
    public $modalMode = '';

    protected $rules = [
        'name' => 'required|string|unique:payment_methods,name',
    ];

    public function mount()
    {
        $this->loadMethods();
    }

    public function loadMethods()
    {
        $this->methods = PaymentMethod::orderBy('name')->get();
    }

    public function showCreateModal()
    {
        $this->reset(['name', 'methodId']);
        $this->modalMode = 'create';
        $this->dispatch('show-method-modal');
    }

    public function showEditModal($id)
    {
        $m = PaymentMethod::findOrFail($id);
        $this->methodId = $m->id;
        $this->name     = $m->name;
        $this->rules['name'] = 'required|string|unique:payment_methods,name,' . $id;
        $this->modalMode = 'edit';
        $this->dispatch('show-method-modal');
    }

    public function saveMethod()
    {
        $this->validate();

        if ($this->modalMode === 'create') {
            PaymentMethod::create(['name' => $this->name]);
            session()->flash('success', 'Método creado.');
        } else {
            $m = PaymentMethod::findOrFail($this->methodId);
            $m->update(['name' => $this->name]);
            session()->flash('success', 'Método actualizado.');
        }

        $this->dispatch('hide-method-modal');
        $this->loadMethods();
    }

    public function deleteMethod($id)
    {
        PaymentMethod::findOrFail($id)->delete();
        session()->flash('success', 'Método eliminado.');
        $this->loadMethods();
    }
    public function render()
    {
        return view('livewire.admin.payment-methods-table');
    }
}
