<div>
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <h2>Cursos</h2>
        <button wire:click="showCreateModal" class="btn btn-accent">
            <i class="bi bi-plus-lg"></i> Nuevo Curso
        </button>
    </div>

    <table class="table table-striped align-middle">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Duración (hs)</th>
                <th>Estado</th>
                <th class="text-end">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($courses as $c)
                <tr>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->duration }}</td>
                    <td>
                        <span class="badge {{ $c->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                            {{ ucfirst($c->status) }}
                        </span>
                    </td>
                    <td class="text-end">
                        <button wire:click="showEditModal({{ $c->id }})" class="btn btn-sm btn-outline-primary me-2">
                            <i class="bi bi-pencil-fill"></i>
                        </button>
                        <button wire:click="deleteCourse({{ $c->id }})" class="btn btn-sm btn-outline-danger"
                            onclick="confirm('¿Eliminar este curso?')||event.stopImmediatePropagation()">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4">No hay cursos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Modal --}}
    <div class="modal fade" id="courseModal" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ $modalMode === 'create' ? 'Nuevo Curso' : 'Editar Curso' }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form wire:submit.prevent="saveCourse">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" wire:model.defer="name"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea wire:model.defer="description"
                                class="form-control @error('description') is-invalid @enderror"></textarea>
                            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Duración (horas)</label>
                                <input type="number" wire:model.defer="duration" min="1"
                                    class="form-control @error('duration') is-invalid @enderror">
                                @error('duration')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Estado</label>
                                <select wire:model.defer="status"
                                    class="form-select @error('status') is-invalid @enderror">
                                    <option value="">-- Elige --</option>
                                    <option value="active">Activo</option>
                                    <option value="inactive">Inactivo</option>
                                </select>
                                @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
            window.addEventListener('show-course-modal', () => {
                new bootstrap.Modal(document.getElementById('courseModal')).show();
            });
            window.addEventListener('hide-course-modal', () => {
                bootstrap.Modal.getInstance(document.getElementById('courseModal')).hide();
            });
        </script>
    @endpush
</div>