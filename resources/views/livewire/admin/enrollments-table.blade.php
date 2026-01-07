<div>
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Estudiante</th>
                    <th>Curso</th>
                    <th>Grupo</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enrollments as $e)
                    <tr>
                        <td>{{ $e->id }}</td>
                        <td>{{ $e->user->first_name }} {{ $e->user->last_name }}</td>
                        <td>{{ $e->courseGroup?->course?->name ?? 'Pendiente' }}</td>
                        <td>{{ $e->course_group_id ? '#' . $e->course_group_id : 'Pendiente' }}</td>
                        <td>
                            <span
                                class="badge {{ $e->status === 'confirmed' ? 'bg-primary' : ($e->status === 'pending' ? 'bg-warning' : ($e->status === 'completed' ? 'bg-success' : 'bg-danger')) }}">
                                {{ ucfirst($e->status) }}
                            </span>
                        </td>
                        <td>{{ $e->enrollment_date?->format('d/m/Y') }}</td>
                        <td class="text-end">
                            @if($e->status !== 'confirmed')
                                <button wire:click="changeStatus({{ $e->id }}, 'confirmed')"
                                    class="btn btn-sm btn-success">Confirmar</button>
                            @endif
                            @if($e->status !== 'cancelled')
                                <button wire:click="changeStatus({{ $e->id }}, 'cancelled')"
                                    class="btn btn-sm btn-danger">Cancelar</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>