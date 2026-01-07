<div class="card">
    <div class="card-header">
        Últimas Matrículas
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Estudiante</th>
                    <th>Curso</th>
                    <th>Grupo</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recent as $enr)
                    <tr>
                        <td>{{ $enr->id }}</td>
                        <td>{{ $enr->user->first_name }} {{ $enr->user->last_name }}</td>
                        <td>
                            {{ optional($enr->courseGroup)->course->name ?? '-' }}
                        </td>
                        <td>
                            #{{ optional($enr->courseGroup)->id ?? '-' }} </td>
                        <td>
                            <span
                                class="badge {{ $enr->status === 'confirmed' ? 'bg-primary' : ($enr->status === 'completed' ? 'bg-success' : 'bg-secondary') }}">
                                {{ ucfirst($enr->status) }}
                            </span>
                        </td>
                        <td>{{ $enr->enrollment_date?->format('d/m/Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            No hay matrículas recientes para mostrar. </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>