<?php

namespace App\Exports;

use App\Models\Enrollment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EnrollmentsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Enrollment::with('user', 'courseGroup.course')
            ->get()
            ->map(function ($e) {
                return [
                    'ID'             => $e->id,
                    'Estudiante'     => "{$e->user->first_name} {$e->user->last_name}",
                    'Curso'          => optional($e->courseGroup)?->course?->name ?? 'N/A',
                    'Grupo'          => $e->course_group_id ?? 'N/A',
                    'Email'          => $e->user->email,
                    'Teléfono'       => $e->user->phone,
                    'Estado'         => $e->status,
                    'Fecha Inscripción' => $e->enrollment_date?->format('Y-m-d') ?? 'No matriculado',
                ];
            });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Estudiante',
            'Curso',
            'Grupo',
            'Email',
            'Teléfono',
            'Estado',
            'Fecha Inscripción',
        ];
    }
}
