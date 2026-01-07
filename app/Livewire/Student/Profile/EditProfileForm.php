<?php

namespace App\Livewire\Student\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditProfileForm extends Component
{
    public bool $editing = false;
    public $first_name;
    public $last_name;
    public $dni;
    public $birth_date;
    public $phone;
    public $address;
    public function mount()
    {
        $user = Auth::user();

        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->dni = $user->dni;
        $this->birth_date = $user->birth_date?->format('Y-m-d');
        $this->phone = $user->phone;
        $this->address = $user->address;
    }

    public function startEditing()
    {
        $this->editing = true;
    }

    public function cancelEditing()
    {
        $this->editing = false;
    }

    public function updateProfile()
    {
        /**
         * @var User $user
         */
        $user = Auth::user();

        $validated = $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'dni'        => ['required', 'string', 'size:8', Rule::unique('users', 'dni')->ignore($user->id)],
            'birth_date' => ['nullable', 'date', 'before:today'],
            'phone'      => ['nullable', 'string', 'max:20'],
            'address'    => ['nullable', 'string', 'max:255'],
        ]);

        $user->update($validated);

        $this->editing = false;
        session()->flash('success', 'Tu perfil se ha actualizado correctamente.');
    }

    public function render()
    {
        return view('livewire.student.profile.edit-profile-form');
    }
}
