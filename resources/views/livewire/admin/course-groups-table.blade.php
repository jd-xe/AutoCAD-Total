<div>
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 mb-0">Grupos de Curso</h2>
        <button wire:click="showCreateModal" class="btn btn-accent btn-sm">
            <i class="bi bi-plus-lg"></i> Nuevo Grupo
        </button>
    </div>


    {{-- FILTROS --}}
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Filtros</span>
            <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse"
                data-bs-target="#filtersCollapse">
                <i class="bi bi-funnel"></i>
            </button>
        </div>
        <div class="collapse show" id="filtersCollapse">
            <div class="card-body">
                <form wire:submit.prevent="applyFilters" class="row gx-2 gy-3 align-items-end">
                    <!-- Curso -->
                    <div class="col-sm-6 col-md-2">
                        <label class="form-label small mb-1">Curso</label>
                        <select wire:model.defer="filterCourse" class="form-select form-select-sm">
                            <option value="">Todos</option>
                            @foreach($courses as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Docente -->
                    <div class="col-sm-6 col-md-2">
                        <label class="form-label small mb-1">Docente</label>
                        <select wire:model.defer="filterTeacher" class="form-select form-select-sm">
                            <option value="">Todos</option>
                            @foreach($teachers as $t)
                                <option value="{{ $t->id }}">{{ $t->first_name }} {{ $t->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Fecha Inicio -->
                    <div class="col-sm-6 col-md-2">
                        <label class="form-label small mb-1">Inicio ≥</label>
                        <input type="date" wire:model.defer="filterStart" class="form-control form-control-sm">
                    </div>
                    <!-- Fecha Fin -->
                    <div class="col-sm-6 col-md-2">
                        <label class="form-label small mb-1">Inicio ≤</label>
                        <input type="date" wire:model.defer="filterEnd" class="form-control form-control-sm">
                    </div>
                    <!-- Estado -->
                    <div class="col-sm-6 col-md-2">
                        <label class="form-label small mb-1">Estado</label>
                        <select wire:model.defer="filterStatus" class="form-select form-select-sm">
                            <option value="">Activos</option>
                            <option value="all">Todos</option>
                            <option value="closed">Cerrados</option>
                        </select>
                    </div>
                    <!-- Botones -->
                    <div class="col-sm-6 col-md-2 d-flex gap-1">
                        <button type="submit" class="btn btn-primary btn-sm flex-fill">
                            <i class="bi bi-funnel-fill"></i> Filtrar
                        </button>
                        <button type="button" wire:click="resetFilters"
                            class="btn btn-outline-secondary btn-sm flex-fill">
                            <i class="bi bi-arrow-counterclockwise"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Curso</th>
                    <th>Docente</th>
                    <th>Horarios</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Cupo</th>
                    <th>Estado</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($groups as $g)
                    <tr>
                        <td>{{ $g->id }}</td>
                        <td>{{ $g->course->name }}</td>
                        <td>{{ $g->teacher->first_name }} {{ $g->teacher->last_name }}</td>
                        <td>
                            @forelse($g->schedules as $sch)
                                <span class="badge bg-secondary mb-1">
                                    {{ $sch->day }}
                                    {{ \Illuminate\Support\Str::substr($sch->start_time, 0, 5) }}–{{ \Illuminate\Support\Str::substr($sch->end_time, 0, 5) }}
                                </span>
                            @empty
                                <span class="text-muted">—</span>
                            @endforelse
                        </td>
                        <td>{{ \Carbon\Carbon::parse($g->start_date)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($g->end_date)->format('d/m/Y') }}</td>
                        <td>{{ $g->enrollments_count ?? '-' }} / {{ $g->max_capacity ?? '∞' }}</td>
                        <td>
                            <span class="badge {{ $g->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($g->status) }}
                            </span>
                        </td>
                        <td class="text-end">
                            <button wire:click="showEditModal({{ $g->id }})" class="btn btn-sm btn-outline-primary me-2">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button wire:click="deleteGroup({{ $g->id }})" class="btn btn-sm btn-outline-danger"
                                onclick="confirm('¿Eliminar este grupo?')||event.stopImmediatePropagation()">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                            <a href="{{ route('admin.groups.students', $g->id) }}" class="btn btn-sm btn-outline-info me-2">
                                <i class="bi bi-people"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-4">No hay grupos.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $groups->links() }}
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="groupModal" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ $modalMode === 'create' ? 'Nuevo Grupo' : 'Editar Grupo' }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form wire:submit.prevent="saveGroup">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Curso</label>
                                <select wire:model.defer="course_id"
                                    class="form-select @error('course_id') is-invalid @enderror">
                                    <option value="">-- Elige --</option>
                                    @foreach($courses as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                                @error('course_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Docente</label>
                                <select wire:model.defer="teacher_id"
                                    class="form-select @error('teacher_id') is-invalid @enderror">
                                    <option value="">-- Elige --</option>
                                    @foreach($teachers as $t)
                                        <option value="{{ $t->id }}">{{ $t->first_name }} {{ $t->last_name }}</option>
                                    @endforeach
                                </select>
                                @error('teacher_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Fecha Inicio</label>
                                <input type="date" wire:model.defer="start_date"
                                    class="form-control @error('start_date') is-invalid @enderror">
                                @error('start_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Fecha Fin</label>
                                <input type="date" wire:model.defer="end_date"
                                    class="form-control @error('end_date') is-invalid @enderror">
                                @error('end_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Cupo Máximo</label>
                                <input type="number" wire:model.defer="max_capacity" min="1"
                                    class="form-control @error('max_capacity') is-invalid @enderror">
                                @error('max_capacity')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Estado</label>
                                <select wire:model.defer="status"
                                    class="form-select @error('status') is-invalid @enderror">
                                    <option value="">-- Elige --</option>
                                    <option value="active">Activo</option>
                                    <option value="closed">Cerrado</option>
                                </select>
                                @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Horarios</label>
                                <div class="accordion" id="schedulesAccordion">
                                    @foreach(['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'] as $day)
                                        @php
                                            $daySchedules = $schedules->where('day', $day);
                                            $collapseId = "collapse" . \Illuminate\Support\Str::slug($day);
                                        @endphp

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading-{{ $collapseId }}">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}"
                                                    aria-expanded="false" aria-controls="{{ $collapseId }}">
                                                    {{ $day }} ({{ $daySchedules->count() }})
                                                </button>
                                            </h2>
                                            <div id="{{ $collapseId }}" class="accordion-collapse collapse"
                                                aria-labelledby="heading-{{ $collapseId }}"
                                                data-bs-parent="#schedulesAccordion">
                                                <div class="accordion-body">
                                                    @if($daySchedules->isEmpty())
                                                        <span class="text-muted">No hay horarios</span>
                                                    @else
                                                        <div class="row g-2">
                                                            @foreach($daySchedules as $sch)
                                                                <div class="col-6 col-lg-4">
                                                                    <label class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            wire:model.defer="selectedSchedules"
                                                                            value="{{ $sch->id }}" id="sch{{ $sch->id }}">
                                                                        <span class="form-check-label">
                                                                            {{ \Illuminate\Support\Str::substr($sch->start_time, 0, 5) }}
                                                                            –
                                                                            {{ \Illuminate\Support\Str::substr($sch->end_time, 0, 5) }}
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @error('selectedSchedules')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Selecciona los horarios correspondientes.</div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">
                            {{ $modalMode === 'create' ? 'Crear' : 'Guardar' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            window.addEventListener('show-group-modal', () => {
                new bootstrap.Modal(document.getElementById('groupModal')).show();
            });
            window.addEventListener('hide-group-modal', () => {
                bootstrap.Modal.getInstance(document.getElementById('groupModal')).hide();
            });
        </script>
    @endpush
</div>