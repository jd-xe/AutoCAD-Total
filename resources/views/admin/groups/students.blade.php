@extends('components.layouts.admin')

@section('title', "Estudiantes de Grupo #{$group->id}")

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Estudiantes en {{ $group->course->name }} #{{ $group->id }}</h2>

        @if($students->isEmpty())
            <div class="alert alert-info">No hay estudiantes confirmados en este grupo.</div>
        @else
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $u)
                            <tr>
                                <td>{{ $u->dni }}</td>
                                <td>{{ $u->first_name }} {{ $u->last_name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->phone ?? '—' }}</td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal"
                                        data-bs-target="#moveModal{{ $u->id }}">
                                        <i class="bi bi-arrow-left-right"></i>
                                    </button>
                                </td>
                            </tr>

                            {{-- Modal para mover estudiante --}}
                            <div class="modal fade" id="moveModal{{ $u->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-dark text-white">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                Mover {{ $u->first_name }} {{ $u->last_name }}
                                            </h5>
                                            <button type="button" class="btn-close btn-close-white"
                                                data-bs-dismiss="modal"></button>
                                        </div>
                                        <form method="POST" action="{{ route('admin.groups.move-student', [$group->id, $u->id]) }}">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Nuevo Grupo ({{ $group->course->name }})</label>
                                                    <select name="new_group_id" class="form-select" required>
                                                        <option value="">— Elige grupo —</option>
                                                        @foreach(\App\Models\CourseGroup::where('course_id', $group->course_id)->where('status', 'active')->where('id', '<>', $group->id)->get() as $g2)
                                                            <opt    ion value="{{ $g2->id }}">
                                                                    Grupo #{{ $g2->id }}
                                                                    ({{ \Carbon\Carbon::parse($g2->start_date)->format('d/m/Y') }}
                                                                    – {{ \Carbon\Carbon::parse($g2->end_date)->format('d/m/Y') }})
                                                            </option>
                                                        @endforeach
                                                </select>
                                                </div>
                                               </di v>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                                                    Cancelar
                                                </button>
                                                <button type="submit" class="btn btn-accent">
                                            Mover
                                            </button>
                                    </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
        @endif
        </div>
@endsection