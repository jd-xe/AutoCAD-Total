<div>
    {{-- Mensajes --}}
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Conceptos de Pago</h2>
        <button wire:click="showCreateModal" class="btn btn-accent">
            <i class="bi bi-plus-lg"></i> Nuevo
        </button>
    </div>

    {{-- Tabla --}}
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Monto</th>
                    <th>Curso</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($concepts as $c)
                    <tr>
                        <td>{{ $c->name }}</td>
                        <td>{{ ucfirst($c->type) }}</td>
                        <td>S/ {{ number_format($c->amount, 2) }}</td>
                        <td>{{ optional($c->course)->name ?? '—' }}</td>
                        <td class="text-end">
                            <button wire:click="showEditModal({{ $c->id }})" class="btn btn-sm btn-outline-primary me-2">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button wire:click="deleteConcept({{ $c->id }})" class="btn btn-sm btn-outline-danger"
                                onclick="confirm('¿Eliminar este concepto?')||event.stopImmediatePropagation()">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">No hay conceptos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Modal --}}
    <div class="modal fade" tabindex="-1" id="conceptModal" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ $modalMode === 'create' ? 'Nuevo Concepto' : 'Editar Concepto' }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form wire:submit.prevent="saveConcept">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" wire:model.defer="name"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tipo</label>
                            <select wire:model.defer="type" class="form-select @error('type') is-invalid @enderror">
                                <option value="">-- Elige --</option>
                                <option value="enrollment">Enrollment</option>
                                <option value="document">Document</option>
                                <option value="other">Other</option>
                            </select>
                            @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Monto</label>
                            <input type="number" step="0.01" wire:model.defer="amount"
                                class="form-control @error('amount') is-invalid @enderror">
                            @error('amount')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Curso (opcional)</label>
                            <select wire:model.defer="course_id"
                                class="form-select @error('course_id') is-invalid @enderror">
                                <option value="">-- Ninguno --</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                            @error('course_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
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

    {{-- Scripts para mostrar/ocultar modal --}}
    @push('scripts')
        <script>
            Livewire.on('show-concept-modal', () => {
                new bootstrap.Modal(document.getElementById('conceptModal')).show();
            });
            Livewire.on('hide-concept-modal', () => {
                bootstrap.Modal.getInstance(document.getElementById('conceptModal')).hide();
            });
        </script>
    @endpush
</div>