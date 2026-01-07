<div>
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Horarios</h2>
        <button wire:click="showCreateModal" class="btn btn-accent">
            <i class="bi bi-plus-lg"></i> Nuevo Horario
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>Día</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($schedules as $s)
                    <tr>
                        <td>{{ $s->day }}</td>
                        <td>{{ substr($s->start_time, 0, 5) }}</td>
                        <td>{{ substr($s->end_time, 0, 5) }}</td>
                        <td class="text-end">
                            <button wire:click="showEditModal({{ $s->id }})" class="btn btn-sm btn-outline-primary me-2">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button wire:click="deleteSchedule({{ $s->id }})" class="btn btn-sm btn-outline-danger"
                                onclick="confirm('¿Eliminar este horario?')||event.stopImmediatePropagation()">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">No hay horarios.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="scheduleModal" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ $modalMode === 'create' ? 'Nuevo Horario' : 'Editar Horario' }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form wire:submit.prevent="saveSchedule">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Día</label>
                            <select wire:model.defer="day" class="form-select @error('day') is-invalid @enderror">
                                <option value="">— Elige —</option>
                                @foreach(['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'] as $d)
                                    <option value="{{ $d }}">{{ $d }}</option>
                                @endforeach
                            </select>
                            @error('day')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Inicio</label>
                                <input type="time" wire:model.defer="start_time"
                                    class="form-control @error('start_time') is-invalid @enderror">
                                @error('start_time')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Fin</label>
                                <input type="time" wire:model.defer="end_time"
                                    class="form-control @error('end_time') is-invalid @enderror">
                                @error('end_time')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
            window.addEventListener('show-schedule-modal', () => {
                new bootstrap.Modal(document.getElementById('scheduleModal')).show();
            });
            window.addEventListener('hide-schedule-modal', () => {
                bootstrap.Modal.getInstance(document.getElementById('scheduleModal')).hide();
            });
        </script>
    @endpush
</div>