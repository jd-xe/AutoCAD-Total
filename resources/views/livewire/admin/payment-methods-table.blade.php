<div>
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Métodos de Pago</h2>
        <button wire:click="showCreateModal" class="btn btn-accent">
            <i class="bi bi-plus-lg"></i> Nuevo
        </button>
    </div>

    <table class="table table-striped align-middle">
        <thead>
            <tr>
                <th>Nombre</th>
                <th class="text-end">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($methods as $m)
                <tr>
                    <td>{{ $m->name }}</td>
                    <td class="text-end">
                        <button wire:click="showEditModal({{ $m->id }})" class="btn btn-sm btn-outline-primary me-2">
                            <i class="bi bi-pencil-fill"></i>
                        </button>
                        <button wire:click="deleteMethod({{ $m->id }})" class="btn btn-sm btn-outline-danger"
                            onclick="confirm('¿Eliminar este método?')||event.stopImmediatePropagation()">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center py-4">No hay métodos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Modal --}}
    <div class="modal fade" id="methodModal" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ $modalMode === 'create' ? 'Nuevo Método' : 'Editar Método' }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form wire:submit.prevent="saveMethod">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" wire:model.defer="name"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
            window.addEventListener('show-method-modal', () => {
                new bootstrap.Modal(document.getElementById('methodModal')).show();
            });
            window.addEventListener('hide-method-modal', () => {
                bootstrap.Modal.getInstance(document.getElementById('methodModal')).hide();
            });
        </script>
    @endpush
</div>