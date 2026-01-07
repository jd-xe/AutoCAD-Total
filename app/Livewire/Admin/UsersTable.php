<?php

namespace App\Livewire\Admin;

use App\Exports\UsersExport;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class UsersTable extends Component
{
    use WithPagination;

    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $dni;
    public $birth_date;
    public $address;
    public $selectedRoles = [];
    public $userId;
    public $modalMode = '';

    public $search = '';
    public $filterRole = '';

    protected $queryString = [
        'search'     => ['except' => ''],
        'filterRole' => ['except' => ''],
        'page'       => ['except' => 1],
    ];

    protected function rules()
    {
        $emailRule = Rule::unique('users', 'email');
        $dniRule   = Rule::unique('users', 'dni');

        if ($this->modalMode === 'edit') {
            $emailRule = $emailRule->ignore($this->userId);
            $dniRule   = $dniRule->ignore($this->userId);
        }

        return [
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => ['required', 'email', 'max:255', $emailRule],
            'dni'           => ['required', 'string', 'size:8', $dniRule],
            'phone'         => ['nullable', 'string', 'max:20', 'regex:/^[0-9\s\-\+]+$/'],
            'birth_date'    => 'nullable|date|before:today',
            'address'       => 'nullable|string|max:255',
            'selectedRoles' => 'required|array|min:1',
        ];
    }

    public function showCreateModal()
    {
        $this->resetForm();
        $this->modalMode = 'create';
        $this->dispatch('show-user-modal');
    }

    public function showEditModal($id)
    {
        $user = User::with('roles')->findOrFail($id);

        $this->userId       = $id;
        $this->first_name   = $user->first_name;
        $this->last_name    = $user->last_name;
        $this->email        = $user->email;
        $this->phone        = $user->phone;
        $this->dni          = $user->dni;
        $this->birth_date   = optional($user->birth_date)->format('Y-m-d');
        $this->address      = $user->address;
        $this->selectedRoles = $user->roles->pluck('id')->toArray();

        $this->modalMode = 'edit';
        $this->dispatch('show-user-modal');
    }

    public function saveUser()
    {
        $this->validate();

        if ($this->modalMode === 'create') {
            $user = User::create([
                'first_name' => $this->first_name,
                'last_name'  => $this->last_name,
                'email'      => $this->email,
                'dni'        => $this->dni,
                'phone'      => $this->phone,
                'birth_date' => $this->birth_date,
                'address'    => $this->address,
            ]);
            $user->authentication()->create([
                'password' => bcrypt(Str::random(12)),
            ]);
            session()->flash('success', 'Usuario creado.');
        } else {
            $user = User::findOrFail($this->userId);
            $user->update([
                'first_name' => $this->first_name,
                'last_name'  => $this->last_name,
                'email'      => $this->email,
                'dni'        => $this->dni,
                'phone'      => $this->phone,
                'birth_date' => $this->birth_date,
                'address'    => $this->address,
            ]);
            session()->flash('success', 'Usuario actualizado.');
        }

        $user->roles()->sync($this->selectedRoles);

        $this->dispatch('hide-user-modal');
        $this->resetForm();
    }

    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('success', 'Usuario eliminado.');
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterRole()
    {
        $this->resetPage();
    }

    public function applyFilters()
    {
        $this->resetPage();
        // no hace falta más: Livewire renderizará render()
    }

    public function export()
    {
        return Excel::download(
            new UsersExport($this->search, $this->filterRole),
            'matriculas.xlsx'
        );
    }

    public function render()
    {
        $users = User::with('roles')
            ->when($this->search, function ($q) {
                $q->where(
                    fn($q2) =>
                    $q2->where('first_name', 'like', "%{$this->search}%")
                        ->orWhere('last_name', 'like', "%{$this->search}%")
                        ->orWhere('dni', 'like', "%{$this->search}%")
                );
            })
            ->when(
                $this->filterRole,
                fn($q) =>
                $q->whereHas('roles', fn($q2) => $q2->where('id', $this->filterRole))
            )
            ->orderBy('first_name')
            ->paginate(10);

        return view('livewire.admin.users-table', [
            'users' => $users,
            'roles' => Role::orderBy('name')->get(),
        ]);
    }

    private function resetForm()
    {
        $this->reset(['first_name', 'last_name', 'email', 'dni', 'phone', 'birth_date', 'address', 'selectedRoles', 'userId']);
    }
}
