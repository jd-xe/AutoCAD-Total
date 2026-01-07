<?php

namespace App\Exports;

use App\Models\Enrollment;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromQuery, WithHeadings, WithMapping
{
    protected $search;
    protected $filterRole;

    public function __construct(string $search = '', string $filterRole = '')
    {
        $this->search     = $search;
        $this->filterRole = $filterRole;
    }

    public function query()
    {
        return User::query()
            ->with('roles')
            ->when($this->search, function ($q) {
                $q->where(
                    fn($q2) =>
                    $q2->where('first_name', 'like', "%{$this->search}%")
                        ->orWhere('last_name',  'like', "%{$this->search}%")
                        ->orWhere('dni',        'like', "%{$this->search}%")
                );
            })
            ->when($this->filterRole, function ($q) {
                $q->whereHas(
                    'roles',
                    fn($q2) =>
                    $q2->where('id', $this->filterRole)
                );
            });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Apellido',
            'Email',
            'DNI',
            'Teléfono',
            'Fecha Nac.',
            'Dirección',
            'Roles'
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->first_name,
            $user->last_name,
            $user->email,
            $user->dni,
            $user->phone,
            optional($user->birth_date)->format('Y-m-d'),
            $user->address,
            $user->roles->pluck('name')->map(fn($n) => ucfirst($n))->implode(', '),
        ];
    }
}
